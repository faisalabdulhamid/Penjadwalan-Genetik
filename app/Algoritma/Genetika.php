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

    public $individu;    //-->[$perkulihan, $jadwal]
    public $fitness;

    public $perkuliahan;
    protected $jam;
    protected $hari;
    public $ruangan_teori;
    public $ruangan_praktikum;

    public $ketentuan_dosen;
    public $ketentuan_matkul;
    public $ketentuan_ruangan;

    public function __construct($mutasi, $crossover, $populasi)
    {
        $this->mutasi = $mutasi;
        $this->crossover = $crossover;
        $this->populasi = $populasi;
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
        })->get();

        $this->jam = Jam::get()->pluck('id');
        $this->hari = Hari::get()->pluck('id');
        $this->ruangan_teori = Ruangan::where('jenis', $this->TEORI)->get()->pluck('id');
        $this->ruangan_praktikum = Ruangan::where('jenis', 'LABORATORIUM')->get()->pluck('id');

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
                        $idx = mt_rand(1, $this->jam->count() - 1);
                        $jam = $this->jam[$idx];
                        break;
                    case 2:
                        $idx = mt_rand(1, ($this->jam->count() - 1) - 1);
                        $jam = $this->jam[$idx];
                        break;
                    case 3:
                        $idx = mt_rand(1, ($this->jam->count() - 1) - 2);
                        $jam = $this->jam[$idx];
                        break;
                    case 4:
                        $idx = mt_rand(1, ($this->jam->count() - 1) - 3);
                        $jam = $this->jam[$idx];
                        break;
                    default:
                        $idx = mt_rand(1, ($this->jam->count() - 1) - 3);
                        $jam = $this->jam[$idx];
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

                return [
                    'perkuliahan' => $kuliah->id,
                    'dosen' => $kuliah->dosen_id,
                    'matkul' => $kuliah->matkul_id,
                    'kelas' => $kuliah->kelas_id,
                    'sks' => $kuliah->matkul->sks,

                    'hari' => $this->hari->random(),
                    'jam' => $jam,
                    'ruangan' => $ruangan,
                ];
            });
        });

        $this->individu = $indv->map(function($item){
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
                        if ($val->hari === $val2->hari && $val->jam === $val2->jam && $val->ruangan === $val2->ruangan) {
                            $penalty += 1;
                        }

                        //ketika 2 sks
                        if ($val->sks === 2) {
                            if ($val->jam + 1 === $val2->jam && $val->hari === $val2->hari && $val->ruangan === $val2->ruangan) {
                                $penalty += 1;
                            }
                        }

                        //ketika 3 sks
                        if ($val->sks === 3) {
                            if ($val->jam + 2 === $val2->jam && $val->hari === $val2->hari && $val->ruangan === $val2->ruangan) {
                                $penalty += 1;
                            }
                        }

                        //ketika 4 sks
                        if ($val->sks === 4) {
                            if ($val->jam + 3 === $val2->jam && $val->hari === $val2->hari && $val->ruangan === $val2->ruangan) {
                                $penalty += 1;
                            }
                        }

                        #BENTROK DOSEN
                        if ($val->hari === $val2->hari && $val->jam === $val2->jam && $val->dosen === $val2->dosen) {
                            $penalty += 1;
                        }

                        //ketika 2 sks
                        if ($val->sks === 2) {
                            if ($val->jam + 1 === $val2->jam && $val->hari === $val2->hari && $val->dosen === $val2->dosen) {
                                $penalty += 1;
                            }
                        }

                        //ketika 3 sks
                        if ($val->sks === 3) {
                            if ($val->jam + 2 === $val2->jam && $val->hari === $val2->hari && $val->dosen === $val2->dosen) {
                                $penalty += 1;
                            }
                        }

                        //ketika 4 sks
                        if ($val->sks === 4) {
                            if ($val->jam + 3 === $val2->jam && $val->hari === $val2->hari && $val->dosen === $val2->dosen) {
                                $penalty += 1;
                            }
                        }
                    }
                });//END BENTROK RUANGAN, DOSEN
                
                // return $val->perkuliahan;

                #KETENTUAN DOSEN
                $this->ketentuan_dosen->each(function($dosen, $d) use($val, &$penalty){
                    if($val->dosen === $dosen->dosen && $val->hari === $dosen->hari && $val->jam === $dosen->jam){
                        $penalty += 1;
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
    }

    public function Seleksi()
    {
        // $this->fitness->max
    }

}