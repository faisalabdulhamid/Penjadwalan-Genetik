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
use App\KetentuanDosen;
use App\KetentuanMatkul;
use App\KetentuanRuangan;
use App\Pengampu;
use App\Ruangan;

class Genetika
{
    private $PRAKTIKUM = 'PRAKTIKUM';
    private $TEORI = 'TEORI';
    private $LABORATORIUM = 'LABORATORIUM';

    private $jenis_semester;
    private $tahun_akademik;
    private $populasi;
    private $crossOver;
    private $mutasi;

    private $pengampu = array();
    private $individu = array(array(array()));
    private $sks = array();
    private $dosen = array();
    private $jenis_mk = array();
    private $mk = array();

    private $jam = array();
    private $hari = array();

    //waktu keinginan dosen
    private $waktu_dosen = array(array());

    private $ruangLaboratorium = array();
    private $ruangReguler = array();
    private $logAmbilData;
    private $logInisialisasi;

    private $log;
    private $induk = array();

    //jumat
    private $kode_jumat;
    private $range_jumat = array();
    private $kode_dhuhur;
    private $is_waktu_dosen_tidak_bersedia_empty;

    #KETENTUAN DOSEN
    private $ketentuan_dosen = array(array());
    private $jlm_ketentuan_dosen = 0;
    /*
     * [
     *  ['id' => 1, nilai_fitness => 1]
     * ]
     */
    #KETENTUAN MATKUL
    private $ketentuan_matkul = array(array());
    private $jlm_ketentuan_matkul = 0;

    #KETENTUAN RUANGAN
    private $ketentuan_ruangan = array();
    private $jlm_ketentuan_ruangan = 0;

    public function __construct($jenis_semester, $tahun_akademik, $populasi, $crossOver, $mutasi, $kode_jumat, $range_jumat, $kode_dhuhur)
    {
        $this->jenis_semester = $jenis_semester;
        $this->tahun_akademik = $tahun_akademik;
        $this->populasi       = intval($populasi);
        $this->crossOver      = $crossOver;
        $this->mutasi         = $mutasi;

        $this->kode_jumat = $kode_jumat;
        $this->range_jumat    = explode('-',$range_jumat);//$hari_jam = explode(':', $this->waktu_dosen[$j][1]);
        $this->kode_dhuhur    = intval($kode_dhuhur);
    }

    public function ambilData()
    {
        $i =0;
        foreach(Pengampu::all() as $data){
            $this->pengampu[$i] = intval($data->id);
            $this->sks[$i] = intval($data->matkul->sks);
            $this->dosen[$i] = intval($data->dosen->id);
            $this->jenis_mk[$i] = $data->matkul->jenis;
            $this->mk[$i] = $data->matkul->id;
            $i++;
        }

        $i = 0;
        foreach(Jam::all() as $data){
            $this->jam[$i] = intval($data->id);
            $i++;
        }

        $i=0;
        foreach(Hari::all() as $data){
            $this->hari[$i] = intval($data->id);
            $i++;
        }

        $i=0;
        foreach(Ruangan::where('jenis', $this->TEORI)->get() as $data){
            $this->ruangReguler[$i] = intval($data->id);
            $i++;
        }

        $i=0;
        foreach(Ruangan::where('jenis', $this->LABORATORIUM)->get() as $data){
            $this->ruangLaboratorium[$i] = intval($data->id);
            $i++;
        }

        $i=0;
        foreach(KetentuanDosen::all() as $data){
            $this->ketentuan_dosen[$i][0] = intval($data->dosen_id); // dosen_id
            $this->ketentuan_dosen[$i][1] = intval($data->hari_id); // hari_id
            $this->ketentuan_dosen[$i][2] = intval($data->jam_id); // jam_id
            $this->ketentuan_dosen[$i][3] = intval($data->bobot_fitness);//bobot fitness
            $i++;
            $this->jlm_ketentuan_dosen += 1;
        }

        $i=0;
        foreach(KetentuanMatkul::all() as $data){
            $this->ketentuan_matkul[$i][0] = intval($data->matkul_id);
            $this->ketentuan_matkul[$i][1] = intval($data->ruangan_id);
            $i++;
            $this->jlm_ketentuan_matkul += 1;
        }

        $i=0;
        foreach(KetentuanRuangan::all() as $data){
            $this->ketentuan_matkul[$i][0] = intval($data->ruangan_id);
            $this->ketentuan_matkul[$i][1] = intval($data->hari_id);
            $i++;
            $this->jlm_ketentuan_ruangan += 1;
        }

    }

    public function inisialisasi()
    {
        $jumlah_pengampu = count($this->pengampu);
        $jumlah_jam = count($this->jam);
        $jumlah_hari = count($this->hari);
        $jumlah_ruang_reguler = count($this->ruangReguler);
        $jumlah_ruang_lab = count($this->ruangLaboratorium);

        for($i=0; $i<$this->populasi; $i++){

            for($j=0; $j<$jumlah_pengampu; $j++){

                $sks = $this->sks[$j];

                $this->individu[$i][$j][0] = $j;

                // Penentuan jam secara acak ketika 1 sks
                if ($sks == 1) {
                    $this->individu[$i][$j][1] = mt_rand(0,  $jumlah_jam - 1);
                }

                // Penentuan jam secara acak ketika 2 sks
                if ($sks == 2) {
                    $this->individu[$i][$j][1] = mt_rand(0, ($jumlah_jam - 1) - 1);
                }

                // Penentuan jam secara acak ketika 3 sks
                if ($sks == 3) {
                    $this->individu[$i][$j][1] = mt_rand(0, ($jumlah_jam - 1) - 2);
                }

                // Penentuan jam secara acak ketika 4 sks
                if ($sks == 4) {
                    $this->individu[$i][$j][1] = mt_rand(0, ($jumlah_jam - 1) - 3);
                }

                $this->individu[$i][$j][2] = mt_rand(0, $jumlah_hari - 1); // Penentuan hari secara acak

                //jenis mk
                if ($this->jenis_mk[$j] === $this->TEORI) {
                    $this->individu[$i][$j][3] = intval($this->ruangReguler[mt_rand(0, $jumlah_ruang_reguler - 1)]);
                } else {
                    $this->individu[$i][$j][3] = intval($this->ruangLaboratorium[mt_rand(0, $jumlah_ruang_lab - 1)]);
                }

                $this->individu[$i][$j][3] = $this->mk; // Penentuan hari secara acak
            }

        }
    }

    public function cekFitness($indv)
    {
        $penalty = 0;

        $hari_jumat = intval($this->kode_jumat);
        $jumat_0 = intval($this->range_jumat[0]);
        $jumat_1 = intval($this->range_jumat[1]);
//        $jumat_2 = intval($this->range_jumat[2]);

        //var_dump($this->range_jumat);
        //exit();

        $jumlah_pengampu = count($this->pengampu);

		
        for ($i = 0; $i < $jumlah_pengampu; $i++)
        {

            $sks = intval($this->sks[$i]);

            $jam_a = intval($this->individu[$indv][$i][1]);
            $hari_a = intval($this->individu[$indv][$i][2]);
            $ruang_a = intval($this->individu[$indv][$i][3]);
            $dosen_a = intval($this->dosen[$i]);


            for ($j = 0; $j < $jumlah_pengampu; $j++) {

                $jam_b = intval($this->individu[$indv][$j][1]);
                $hari_b = intval($this->individu[$indv][$j][2]);
                $ruang_b = intval($this->individu[$indv][$j][3]);
                $dosen_b = intval($this->dosen[$j]);


                //1.bentrok ruang dan waktu dan 3.bentrok dosen

                //ketika pemasaran matakuliah sama, maka langsung ke perulangan berikutnya
                if ($i == $j)
                    continue;

                //#region Bentrok Ruang dan Waktu
                //Ketika jam,hari dan ruangnya sama, maka penalty + satu
                if ($jam_a == $jam_b &&
                    $hari_a == $hari_b &&
                    $ruang_a == $ruang_b)
                {
                    $penalty += 1;
                }

                //Ketika sks  = 2,
                //hari dan ruang sama, dan
                //jam kedua sama dengan jam pertama matakuliah yang lain, maka penalty + 1
                if ($sks >= 2)
                {
                    if ($jam_a + 1 == $jam_b &&
                        $hari_a == $hari_b &&
                        $ruang_a == $ruang_b)
                    {
                        $penalty += 1;
                    }
                }


                //Ketika sks  = 3,
                //hari dan ruang sama dan
                //jam ketiga sama dengan jam pertama matakuliah yang lain, maka penalty + 1
                if ($sks >= 3) {
                    if ($jam_a + 2 == $jam_b &&
                        $hari_a == $hari_b &&
                        $ruang_a == $ruang_b)
                    {
                        $penalty += 1;
                    }
                }

                //Ketika sks  = 4,
                //hari dan ruang sama dan
                //jam ketiga sama dengan jam pertama matakuliah yang lain, maka penalty + 1
                if ($sks >= 4) {
                    if ($jam_a + 3 == $jam_b &&
                        $hari_a == $hari_b &&
                        $ruang_a == $ruang_b)
                    {
                        $penalty += 1;
                    }
                }

                //______________________BENTROK DOSEN
                if (
                    //ketika jam sama
                    $jam_a == $jam_b &&
                    //dan hari sama
                    $hari_a == $hari_b &&
                    //dan dosennya sama
                    $dosen_a == $dosen_b)
                {
                    //maka...
                    $penalty += 1;
                }



                if ($sks >= 2) {
                    if (
                        //ketika jam sama
                        ($jam_a + 1) == $jam_b &&
                        //dan hari sama
                        $hari_a == $hari_b &&
                        //dan dosennya sama
                        $dosen_a == $dosen_b)
                    {
                        //maka...
                        $penalty += 1;
                    }
                }

                if ($sks >= 3) {
                    if (
                        //ketika jam sama
                        ($jam_a + 2) == $jam_b &&
                        //dan hari sama
                        $hari_a == $hari_b &&
                        //dan dosennya sama
                        $dosen_a == $dosen_b)
                    {
                        //maka...
                        $penalty += 1;
                    }
                }

                if ($sks >= 4) {
                    if (
                        //ketika jam sama
                        ($jam_a + 3) == $jam_b &&
                        //dan hari sama
                        $hari_a == $hari_b &&
                        //dan dosennya sama
                        $dosen_a == $dosen_b)
                    {
                        //maka...
                        $penalty += 1;
                    }
                }
            }

            //
            // #region Bentrok sholat Jumat
            if (($hari_a  + 1) == $hari_jumat) //2.bentrok sholat jumat
            {

                if ($sks == 1)
                {
                    if (

                        ($jam_a == ($jumat_0 - 1)) ||
                        ($jam_a == ($jumat_1 - 1))
//                        ($jam_a == ($jumat_2 - 1))

                    )
                    {

                        $penalty += 1;
                    }
                } 


                if ($sks == 2)
                {
                    if (
                        ($jam_a == ($jumat_0 - 2)) ||
                        ($jam_a == ($jumat_0 - 1)) ||
                        ($jam_a == ($jumat_1 - 1))
//                        ($jam_a == ($jumat_2 - 1))
                    )
                    {
                        /*
                        echo '$sks = ' . $sks. '<br>';
                        echo '$jam_a = ' . $jam_a. '<br>';
                        echo '($jumat_0 - 2) = ' . ($jumat_0 - 2) . '<br>';
                        echo '($jumat_0 - 1) = ' . ($jumat_0 - 1). '<br>';
                        echo '($jumat_1 - 1) = ' . ($jumat_1 - 1). '<br>';
                        echo '($jumat_2 - 1) = ' . ($jumat_2- 1). '<br>';
                        exit();
                        */

                        $penalty += 1;
                    }
                }

                if ($sks == 3)
                {
                    if (
                        ($jam_a == ($jumat_0 - 3)) ||
                        ($jam_a == ($jumat_0 - 2)) ||
                        ($jam_a == ($jumat_0 - 1)) ||
                        ($jam_a == ($jumat_1 - 1))
//                        ($jam_a == ($jumat_2 - 1))
                    )
                    {
                        $penalty += 1;
                    }
                }

                if ($sks == 4)
                {
                    if (
                        ($jam_a == ($jumat_0 - 4)) ||
                        ($jam_a == ($jumat_0 - 3)) ||
                        ($jam_a == ($jumat_0 - 2)) ||
                        ($jam_a == ($jumat_0 - 1)) ||
                        ($jam_a == ($jumat_1 - 1))
//                        ($jam_a == ($jumat_2 - 1))
                    )
                    {
                        $penalty += 1;
                    }
                }
            }
            //#endregion

            //#region Bentrok dengan Waktu Keinginan Dosen
            //Boolean penaltyForKeinginanDosen = false;

            for ($j = 0; $j < $this->jlm_ketentuan_dosen; $j++)
            {
                if ($dosen_a == $this->ketentuan_dosen[$j][0])
                {
                    if ($this->jam[$jam_a] == $this->ketentuan_dosen[$j][2] &&
                        $this->hari[$hari_a] == $this->ketentuan_dosen[$j][1])
                    {
                        $penalty += $this->ketentuan_dosen[$j][3];//bobot penalty
                    }
                }
            }


            #endregion

            #region Bentrok waktu dhuhur
            /*
            if ($jam_a == ($this->kode_dhuhur - 1))
            {
                $penalty += 1;
            }
            */

            ##KETENTUAN MATKUL
            for($i=0; $i<$this->jlm_ketentuan_matkul; $i++)
            {

            }

        }

        $fitness = floatval(1 / (1 + $penalty));		
        return $fitness;
    }

    public function hitungFitness()
    {
        $fitness = array();
        for($indv=0; $indv < $this->populasi; $indv++){
            $fitness[$indv] = $this->cekFitness($indv);
        }
        return $fitness;
    }

    public function seleksi($fitness)
    {
        $jumlah =0;
        $rank = array();
        for($i=0; $i<$this->populasi; $i++)
        {
            //prosess Ranking berdasarkan nilai fitness
            $rank[$i] = 1;
            for($j=0; $j<$this->populasi; $j++)
            {
                $fitnessA = floatval($fitness[$i]);
                $fitnessB = floatval($fitness[$j]);

                if($fitnessA > $fitnessB)
                {
                    $rank[$i] += 1;
                }
            }
            $jumlah += $rank[$i];
        }

        $jumlah_rank = count($rank);
        for($i=0; $i<$jumlah_rank; $i++)
        {
            $target = mt_rand(0, $jumlah - 1);

            $cek = 0;
            for($j=0; $j<$jumlah_rank; $j++)
            {
                $cek += $rank[$j];

                if(intval($cek) >= intval($target))
                {
                    $this->induk[$i] = $j;
                }
            }
        }
    }

    public function startCrossOver()
    {
        $individu_baru = array(array(array()));
        $jumlah_pengampu = count($this->pengampu);

        for($i=0; $i<$this->populasi; $i+=2)
        {
            $b =0;
            $cr = mt_rand(0, mt_getrandmax() -1) / mt_getrandmax();

            if(floatval($cr) < floatval($this->crossOver))
            {
                $a = mt_rand(0, $jumlah_pengampu -2);
                while($b <= $a)
                {
                    $b = mt_rand(0, $jumlah_pengampu -1);
                }

                //penentuan jadwal baru dari awal sampai titik pertama
                for ($j = 0; $j < $a; $j++) {
                    for ($k = 0; $k < 4; $k++) {
                        $individu_baru[$i][$j][$k]     = $this->individu[$this->induk[$i]][$j][$k];
                        $individu_baru[$i + 1][$j][$k] = $this->individu[$this->induk[$i + 1]][$j][$k];
                    }
                }

                //Penentuan jadwal baru dai titik pertama sampai titik kedua
                for ($j = $a; $j < $b; $j++) {
                    for ($k = 0; $k < 4; $k++) {
                        $individu_baru[$i][$j][$k]     = $this->individu[$this->induk[$i + 1]][$j][$k];
                        $individu_baru[$i + 1][$j][$k] = $this->individu[$this->induk[$i]][$j][$k];
                    }
                }

                //penentuan jadwal baru dari titik kedua sampai akhir
                for ($j = $b; $j < $jumlah_pengampu; $j++) {
                    for ($k = 0; $k < 4; $k++) {
                        $individu_baru[$i][$j][$k]     = $this->individu[$this->induk[$i]][$j][$k];
                        $individu_baru[$i + 1][$j][$k] = $this->individu[$this->induk[$i + 1]][$j][$k];
                    }
                }
            }
            else
            {
                //Ketika nilai random lebih dari nilai probabilitas pertukaran, maka jadwal baru sama dengan jadwal terpilih
                for ($j = 0; $j < $jumlah_pengampu; $j++) {
                    for ($k = 0; $k < 4; $k++) {
                        $individu_baru[$i][$j][$k]     = $this->individu[$this->induk[$i]][$j][$k];
                        $individu_baru[$i + 1][$j][$k] = $this->individu[$this->induk[$i + 1]][$j][$k];
                    }
                }

            }
        }

        for ($i = 0; $i < $this->populasi; $i += 2) {
            for ($j = 0; $j < $jumlah_pengampu ; $j++) {
                for ($k = 0; $k < 4; $k++) {
                    $this->individu[$i][$j][$k] = $individu_baru[$i][$j][$k];
                    $this->individu[$i + 1][$j][$k] = $individu_baru[$i + 1][$j][$k];
                }
            }
        }
    }

    public function Mutasi()
    {
        $fitness = array();
        //proses perandoman atau penggantian komponen untuk tiap jadwal baru
        $r       = mt_rand(0, mt_getrandmax() - 1) / mt_getrandmax();
        $jumlah_pengampu = count($this->pengampu);
        $jumlah_jam = count($this->jam);
        $jumlah_hari = count($this->hari);
        $jumlah_ruang_reguler = count($this->ruangReguler);
        $jumlah_ruang_lab = count($this->ruangLaboratorium);

        for ($i = 0; $i < $this->populasi; $i++) {
            //Ketika nilai random kurang dari nilai probalitas Mutasi,
            //maka terjadi penggantian komponen

            if ($r < $this->mutasi) {
                //Penentuan pada matakuliah dan kelas yang mana yang akan dirandomkan atau diganti
                $krom = mt_rand(0, $jumlah_pengampu - 1);

                $j = intval($this->sks[$krom]);

                switch ($j) {
                    case 1:
                        $this->individu[$i][$krom][1] = mt_rand(0, $jumlah_jam - 1);
                        break;
                    case 2:
                        $this->individu[$i][$krom][1] = mt_rand(0, ($jumlah_jam - 1) - 1);
                        break;
                    case 3:
                        $this->individu[$i][$krom][1] = mt_rand(0, ($jumlah_jam - 1) - 2);
                        break;
                    case 4:
                        $this->individu[$i][$krom][1] = mt_rand(0, ($jumlah_jam - 1) - 3);
                        break;
                }
                //Proses penggantian hari
                $this->individu[$i][$krom][2] = mt_rand(0, $jumlah_hari - 1);

                //proses penggantian ruang

                if ($this->jenis_mk[$krom] === $this->TEORI) {
                    $this->individu[$i][$krom][3] = $this->ruangReguler[mt_rand(0, $jumlah_ruang_reguler - 1)];
                } else {
                    $this->individu[$i][$krom][3] = $this->ruangLaboratorium[mt_rand(0, $jumlah_ruang_lab - 1)];
                }
            }

            $fitness[$i] = $this->CekFitness($i);
        }
        return $fitness;
    }

    public function GetIndividu($indv)
    {
        //return individu;

        //int[,] individu_solusi = new int[mata_kuliah.Length, 4];
        $individu_solusi = array(array());

        for ($j = 0; $j < count($this->pengampu); $j++)
        {
            $individu_solusi[$j][0] = intval($this->pengampu[$this->individu[$indv][$j][0]]);
            $individu_solusi[$j][1] = intval($this->jam[$this->individu[$indv][$j][1]]);
            $individu_solusi[$j][2] = intval($this->hari[$this->individu[$indv][$j][2]]);
            $individu_solusi[$j][3] = intval($this->individu[$indv][$j][3]);
        }

        return $individu_solusi;
    }

    public function print_data()
    {
        return response()->json([
            'indv' => $this->individu,
            'jam' => $this->jam,
            'hari' => $this->hari,
            'pengampu' => $this->pengampu,
            'dosen' => $this->dosen,
            'jenis_mk' => $this->jenis_mk,
            'r_lab' => $this->ruangLaboratorium,
            'r_' => $this->ruangReguler,
            'fitness' => $this->hitungFitness(),
            'induk' => $this->induk,
            'ketentuan_dosen' => count($this->ketentuan_dosen),
        ]);
    }
}