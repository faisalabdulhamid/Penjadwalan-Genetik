<?php
/**
 * Created by PhpStorm.
 * User: FAISAL ABDUL HAMID
 * Date: 14/09/2017
 * Time: 5:39
 */

namespace App\Algoritma;

use App\Hari;
use App\Jam;
use App\Kelas;
use App\KetentuanDosen as KD;
use App\KetentuanMatkul as KM;
use App\KetentuanRuangan as KR;
use App\Pengampu;
use App\Ruangan;
use App\TahunAjaran;
use Illuminate\Support\Collection;

class Genetika
{
    private $PRAKTIKUM = 'PRAKTIKUM';
    private $TEORI = 'TEORI';
    private $LABORATORIUM = 'LABORATORIUM';

    public $mutasi;
    public $crossover;
    public $populasi;
    public $tingkat;
    public $semester;

    public $individu;    //-->[perkuliahan, dosen, matkul, kelas, hari, jam, ruangan, sks]
    public $fitness;     //-->[arrrayOfFitnessIndividu]
    public $induk;       //--> index dari individu

    public $tabu_list;

    public $perkuliahan; //-->pengampu
    protected $jam;
    protected $hari;
    public $ruangan_teori;
    public $ruangan_praktikum;

    public $ketentuan_dosen;
    public $ketentuan_matkul;
    public $ketentuan_ruangan;

    public $individu_after_crossover;

    public function __construct()//$mutasi, $crossover, $populasi, $semester, $tingkat)
    {
        // $this->mutasi = $mutasi;
        // $this->crossover = $crossover;
        // $this->populasi = $populasi;
        // $this->semester = $semester;
        // $this->tingkat = $tingkat;
        $this->tabu_list = new TabuList;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }

    public function Pengkodean()
    {
        $this->perkuliahan = Pengampu::with('matkul')->whereHas('kelas.tahunAjaran', function($q){
            $q->aktif();
        })->whereHas('matkul', function($query){
            $query->whereIn('tingkat', $this->tingkat)
                ->where('semester', $this->semester);
        })
        // ->limit(10)
        ->get();

        $this->jam = Jam::get()->pluck('id');
        $this->hari = Hari::get()->pluck('id');
        $this->ruangan_teori = Ruangan::where('jenis', $this->TEORI)->get()->pluck('id');
        $this->ruangan_praktikum = Ruangan::where('jenis', $this->LABORATORIUM)->get()->pluck('id');

        $this->ketentuan_dosen = KD::whereHas('dosen.pengampu.kelas.tahunAjaran', function($q){
            $q->aktif();
        })->get()->mapInto(KetentuanDosen::class);

        $this->ketentuan_matkul = KM::whereHas('matkul.pengampu.kelas.tahunAjaran', function($q){
            $q->aktif();
        })->get()->mapInto(KetentuanMatkul::class);

        $this->ketentuan_ruangan = KR::get()->mapInto(KetentuanRuangan::class);
    }

    public function Inisialisasi()
    {
        $indv = Collection::times($this->populasi, function($populasi){
            return Collection::times($this->perkuliahan->count(), function($number, $key){
                $kuliah = $this->perkuliahan[$key];

                switch ($kuliah->matkul->sks) {
                    case 1:
                        $idx = mt_rand(0, $this->jam->count() - 1);
                        $jam = $this->jam[$idx];//$idx;
                        break;
                    case 2:
                        $idx = mt_rand(0, ($this->jam->count() - 1) - 1);
                        $jam = $this->jam[$idx];//$idx;
                        break;
                    case 3:
                        $idx = mt_rand(0, ($this->jam->count() - 1) - 2);
                        $jam = $this->jam[$idx];//$idx;
                        break;
                    case 4:
                        $idx = mt_rand(0, ($this->jam->count() - 1) - 3);
                        $jam = $this->jam[$idx];//$idx;
                        break;
                }

                switch ($kuliah->matkul->jenis) {
                    case $this->TEORI:
                        $ruangan = $this->ruangan_teori->random();
                        break;

                    case $this->PRAKTIKUM:
                        $ruangan = $this->ruangan_praktikum->random();
                        break;
                }

                return (Object) [
                    'perkuliahan' => $kuliah->id,
                    'dosen' => $kuliah->dosen_id,
                    'matkul' => $kuliah->matkul_id,
                    'kelas' => $kuliah->kelas_id,
                    'sks' => $kuliah->matkul->sks,
                    'jenis' => $kuliah->matkul->jenis,

                    'hari' => $this->hari->random(),
                    'jam' => $jam,
                    'ruangan' => $ruangan,
                ];
            });
        });

        $this->individu = $indv->map(function($item){
            $this->tabu_list->addTabulist($item);
            return $item->mapInto(Individu::class);
        });
    }

    public function EvaluasiFitness()
    {
        
        $fitness = $this->individu->map(function($item, $key){
            $penalty = 0;
            
            $item->each(function($val, $i) use($item, &$penalty){          //---->indv1
                $item->each(function($val2, $j) use($i, $val, &$penalty) { //BENTROK RUANGAN, DOSEN
                    if ($i !== $j) {
                        
                        # BENTROK RUANGAN
                        // bentrok 1.hari, 2.jam, 3.ruangan
                        if (
                            $val->hari === $val2->hari && 
                            $val->jam === $val2->jam && 
                            $val->ruangan === $val2->ruangan
                        ) {
                            $penalty += 1;
                        }

                        // //ketika 2 sks
                        if ($val->sks >= 2) {
                            if (
                                ($val->jam + 1) === $val2->jam && 
                                $val->hari === $val2->hari && 
                                $val->ruangan === $val2->ruangan
                            ) {
                                $penalty += 1;
                            }
                        }

                        // //ketika 3 sks
                        if ($val->sks >= 3) {
                            if (
                                ($val->jam + 2) === $val2->jam && 
                                $val->hari === $val2->hari && 
                                $val->ruangan === $val2->ruangan
                            ) {
                                $penalty += 1;
                            }
                        }

                        // //ketika 4 sks
                        if ($val->sks >= 4) {
                            if (
                                ($val->jam + 3) === $val2->jam && 
                                $val->hari === $val2->hari && 
                                $val->ruangan === $val2->ruangan
                            ) {
                                $penalty += 1;
                            }
                        }

                        // #BENTROK DOSEN
                        if ( 
                            $val->jam === $val2->jam && 
                            $val->hari === $val2->hari &&
                            $val->dosen === $val2->dosen
                        ) {
                            $penalty += 1;
                        }

                        // //ketika 2 sks
                        if ($val->sks >= 2) {
                            if (
                                ($val->jam + 1) === $val2->jam && 
                                $val->hari === $val2->hari && 
                                $val->dosen === $val2->dosen
                            ) {
                                $penalty += 1;
                            }
                        }

                        //ketika 3 sks
                        if ($val->sks >= 3) {
                            if (
                                ($val->jam + 2) === $val2->jam && 
                                $val->hari === $val2->hari && 
                                $val->dosen === $val2->dosen
                            ) {
                                $penalty += 1;
                            }
                        }

                        //ketika 4 sks
                        if ($val->sks >= 4) {
                            if (
                                ($val->jam + 3) === $val2->jam && 
                                $val->hari === $val2->hari && 
                                $val->dosen === $val2->dosen
                            ) {
                                $penalty += 1;
                            }
                        }
                    }
                });//END BENTROK RUANGAN, DOSEN
                
                // return $val->perkuliahan;

                #KETENTUAN DOSEN
                $this->ketentuan_dosen->each(function($dosen, $d) use($val, &$penalty){
                    if ($val->dosen === $dosen->dosen) {
                        if(
                            $val->hari === $dosen->hari && 
                            $val->jam === $dosen->jam
                        ){
                            $penalty += 1;
                        }
                    }
                });
                #END KETENTUAN DOSEN

                #KETENTUAN MATKUL
                $this->ketentuan_matkul->each(function($matkul, $m) use($val, &$penalty){
                    if ($val->matkul === $matkul->matkul) {
                        if ($val->ruangan !== $matkul->ruangan) {
                            $penalty += 1;
                        }
                    }
                });
                #END KETENTUAN MATKUL

                #KETENTUAN RUANGAN
                $this->ketentuan_ruangan->each(function($ruangan) use($val, &$penalty){
                    if ($val->ruangan === $ruangan->ruangan) {
                        if ($val->hari === $ruangan->hari) {
                            $penalty += 1;
                        }
                    }
                });
                #END KETENTUAN RUANGAN
            });

            return [
                'penalty' => $penalty,
                'fitness' => (1/(1+$penalty)),
            ];
        });

        $this->fitness = $fitness;
        return $fitness;
        
        

        //-----COba
        // $penalty = 0;
        // for ($indv=0; $indv < $this->populasi; $indv++) { 
        //     for ($i=0; $i < $this->individu->count(); $i++) {
        //         // $genetika->individu[0][0]->perkuliahan;
        //         // 
        //         $sks = $this->individu[$indv][$i]->sks;

        //         $jam_a = $this->individu[$indv][$i]->jam;
        //         $hari_a = $this->individu[$indv][$i]->hari;
        //         $ruangan_a = $this->individu[$indv][$i]->ruangan;
        //         $dosen_a = $this->individu[$indv][$i]->dosen;

        //         $perkuliahan = $this->individu[$indv][$i]->perkuliahan;
        //         for ($j=0; $j < $this->individu->count(); $j++) { 
        //             $jam_b = $this->individu[$indv][$j]->jam;
        //             $hari_b = $this->individu[$indv][$j]->hari;
        //             $ruangan_b = $this->individu[$indv][$j]->ruangan;
        //             $dosen_b = $this->individu[$indv][$j]->dosen;

        //             if ($i === $j) 
        //                 continue;

        //             if ($jam_a == $jam_b &&
        //                 $hari_a == $hari_b &&
        //                 $ruangan_a == $ruangan_b
        //             ) {
        //                 $penalty += 1;
        //             }

        //             //Sks + 
        //         }
        //     }
        // }

        // return (1/1+$penalty);
    }

    public function Seleksi()
    {
        $jumlah = 0;
        $rank = [];
        $this->fitness->map(function($fitnessA, $i) 
        use(&$jumlah, &$rank){
            $rank[$i] = 1;

            $this->fitness->each(function($fitnessB, $j) 
            use(&$jumlah, &$rank, $fitnessA, $i){

                if ($fitnessA['fitness'] > $fitnessB['fitness']) {
                    $rank[$i] += 1;
                }

            });

            $jumlah += $rank[$i];
        });

        $induk = [];

        $this->fitness->map(function($fitness, $i) 
        use($jumlah, $rank, &$induk){
            
            $target = mt_rand(0, $jumlah - 1);

            $cek = 0;

            for ($j=0; $j < count($rank); $j++) {

                $cek += $rank[$j];

                if (intval($cek) >= intval($target)) {
                    $induk[$i] = $j;
                    break;
                }
            }
        });

        $this->induk = collect($induk);//Array index indvidu calon induk

        return $induk;
    }

    public function CrossOver()
    {
        $individu_baru = [[]];
        // $pro = [];

        for($i=0; $i < $this->populasi; $i += 2){
            $b = 0;

            $probabilitas_crossover = mt_rand(0, mt_getrandmax() - 1) / mt_getrandmax();

            if (floatval($probabilitas_crossover) < floatval($this->crossover)) 
            {
                $a = mt_rand(0, $this->perkuliahan->count() - 2);
                
                while ($b <= $a) {
                    $b = mt_rand(0, $this->perkuliahan->count() - 1);
                }

                //awal ke titik 1
                for ($j=0; $j < $a; $j++) { 
                    $individu_baru[$i][$j]     = $this->individu[$this->induk[$i]][$j];
                    $individu_baru[$i + 1][$j] = $this->individu[$this->induk[$i + 1]][$j];
                }

                //titik 1 ke 2
                for ($j=$a; $j < $b; $j++) { 
                    $individu_baru[$i][$j]     = $this->individu[$this->induk[$i + 1]][$j];
                    $individu_baru[$i + 1][$j] = $this->individu[$this->induk[$i]][$j];
                }

                // //titik 2 ke akhir
                for ($j=$b; $j < $this->perkuliahan->count(); $j++) { 
                    $individu_baru[$i][$j]     = $this->individu[$this->induk[$i]][$j];
                    $individu_baru[$i + 1][$j] = $this->individu[$this->induk[$i + 1]][$j];
                }

            } 
            else 
            {
                for ($j=0; $j < $this->perkuliahan->count(); $j++) { 
                    $individu_baru[$i][$j]     = $this->individu[$this->induk[$i]][$j];
                    $individu_baru[$i + 1][$j] = $this->individu[$this->induk[$i + 1]][$j];
                }
            }
        }


        // $this->individu = collect($individu_baru);
        // $this->individu_after_crossover = collect($individu_baru);
        // return [$this->tabu_list->cekInTabulist($individu_baru), $this->tabu_list->tabu_individu];
        $collection_indv_baru = collect($individu_baru)->map(function($item){
            // return $result = $this->tabu_list->cekInTabulist($item);
            // $this->tabu_list->addTabulist(collect($item));
            return collect($item)->mapInto(Individu::class);
        });

        $this->individu = $collection_indv_baru;

        return $collection_indv_baru;
        // // $this->individu = 

        // return [
        //     'idx_induk' => $this->induk, 
        //     'individu_baru' =>$individu_baru, 
        //     'individu' => $this->individu
        // ];
    }

    public function Mutasi()
    {
        $probabilitas_mutasi = mt_rand(0, mt_getrandmax() - 1) / mt_getrandmax();

        for ($i=0; $i < $this->populasi; $i++) {

            if ($probabilitas_mutasi < $this->mutasi) {

                $idx_kromosom = mt_rand(0, $this->perkuliahan->count() - 1);

                $sks = $this->perkuliahan[$idx_kromosom]->matkul->sks;

                switch ($sks) {
                    case 1:
                        $idx = mt_rand(0, $this->jam->count() - 1);
                        $jam = $this->jam[$idx];
                        break;
                    case 2:
                        $idx = mt_rand(0, ($this->jam->count() - 1) - 1);
                        $jam = $this->jam[$idx];
                        break;
                    case 3:
                        $idx = mt_rand(0, ($this->jam->count() - 1) - 2);
                        $jam = $this->jam[$idx];
                        break;
                    case 4:
                        $idx = mt_rand(0, ($this->jam->count() - 1) - 3);
                        $jam = $this->jam[$idx];
                        break;

                }

                //Pergantian Hari
                $this->individu[$i][$idx_kromosom]->hari = $this->hari->random();

                //Pergantian Ruangan
                $jenis_matkul = $this->individu[$i][$idx_kromosom]->jenis;
                switch ($jenis_matkul) {
                    case $this->TEORI:
                        $this->individu[$i][$idx_kromosom]->ruangan = $this->ruangan_teori->random();
                        break;
                    case $this->PRAKTIKUM:
                        $this->individu[$i][$idx_kromosom]->ruangan = $this->ruangan_praktikum->random();
                        break;
                }
            }
        }

        // return $sks;
    }

}