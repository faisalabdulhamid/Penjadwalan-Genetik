<?php

use Illuminate\Database\Seeder;

class AllSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $thn = new \App\TahunAjaran();
        $thn->tahun_ajaran = "2016 - 2017";
        $thn->save();

        $thn = new \App\TahunAjaran();
        $thn->tahun_ajaran = "2017 - 2018";
        $thn->save();

        $thn = new \App\TahunAjaran();
        $thn->tahun_ajaran = "2018 - 2019";
        $thn->save();


        $hari = new \App\Hari();
        $hari->nama = 'Senin';
        $hari->save();

        $hari = new \App\Hari();
        $hari->nama = 'Selasa';
        $hari->save();

        $hari = new \App\Hari();
        $hari->nama = 'Rabu';
        $hari->save();

        $hari = new \App\Hari();
        $hari->nama = 'Kamis';
        $hari->save();

        $hari = new \App\Hari();
        $hari->nama = "Jum'at";
        $hari->save();

        $hari = new \App\Hari();
        $hari->nama = 'Sabtu';
        $hari->save();

        $jam = new \App\Jam();
        $jam->range_jam = "07.00 - 07.45";
        $jam->save();

        $jam = new \App\Jam();
        $jam->range_jam = "07.45 - 08.30";
        $jam->save();

        $jam = new \App\Jam();
        $jam->range_jam = "08.30 - 09.15";
        $jam->save();

        $jam = new \App\Jam();
        $jam->range_jam = "09.15 - 10.00";
        $jam->save();

        $jam = new \App\Jam();
        $jam->range_jam = "10.00 - 10.45";
        $jam->save();

        $jam = new \App\Jam();
        $jam->range_jam = "10.45 - 11.30";
        $jam->save();

        $jam = new \App\Jam();
        $jam->range_jam = "11.30 - 12.15";
        $jam->save();

        $jam = new \App\Jam();
        $jam->range_jam = "12.15 - 13.00";
        $jam->save();

        $jam = new \App\Jam();
        $jam->range_jam = "13.00 - 13.45";
        $jam->save();

        $jam = new \App\Jam();
        $jam->range_jam = "13.45 - 14.30";
        $jam->save();

        $jam = new \App\Jam();
        $jam->range_jam = "14.30 - 15.15";
        $jam->save();

        $jam = new \App\Jam();
        $jam->range_jam = "15.15 - 16.00";
        $jam->save();

        $jam = new \App\Jam();
        $jam->range_jam = "16.00 - 16.45";
        $jam->save();

        $jam = new \App\Jam();
        $jam->range_jam = "16.45 - 17.30";
        $jam->save();

//        $jam = new \App\Jam();
//        $jam->range_jam = "17.30 - 18.15";
//        $jam->save();
//
//        $jam = new \App\Jam();
//        $jam->range_jam = "18.15 - 19.00";
//        $jam->save();
//
//        $jam = new \App\Jam();
//        $jam->range_jam = "19.00 - 19.45";
//        $jam->save();
//
//        $jam = new \App\Jam();
//        $jam->range_jam = "19.45 - 20.30";
//        $jam->save();
//
//        $jam = new \App\Jam();
//        $jam->range_jam = "20.30 - 21.15";
//        $jam->save();


        //------------------------RUANGAN
        $ruangan = new \App\Ruangan();
        $ruangan->nama = '4210';
        $ruangan->jenis = 'TEORI';
        $ruangan->save();

        $ruangan = new \App\Ruangan();
        $ruangan->nama = '4214';
        $ruangan->jenis = 'TEORI';
        $ruangan->save();

        $ruangan = new \App\Ruangan();
        $ruangan->nama = '5204';
        $ruangan->jenis = 'TEORI';
        $ruangan->save();

        $ruangan = new \App\Ruangan();
        $ruangan->nama = '5205';
        $ruangan->jenis = 'TEORI';
        $ruangan->save();

        $ruangan = new \App\Ruangan();
        $ruangan->nama = '5206';
        $ruangan->jenis = 'TEORI';
        $ruangan->save();

        $ruangan = new \App\Ruangan();
        $ruangan->nama = '4516';
        $ruangan->jenis = 'TEORI';
        $ruangan->save();

        $ruangan = new \App\Ruangan();
        $ruangan->nama = '5606';
        $ruangan->jenis = 'TEORI';
        $ruangan->save();
        //digunakan selain senin

        $ruangan = new \App\Ruangan();
        $ruangan->nama = '5607';
        $ruangan->jenis = 'TEORI';
        $ruangan->save();

        $ruangan = new \App\Ruangan();
        $ruangan->nama = 'LAB 4';
        $ruangan->jenis = 'LABORATORIUM';
        $ruangan->save();

        $ruangan = new \App\Ruangan();
        $ruangan->nama = 'LAB 7.010';
        $ruangan->jenis = 'LABORATORIUM';
        $ruangan->save();

        $ruangan = new \App\Ruangan();
        $ruangan->nama = 'LAB 9.010';
        $ruangan->jenis = 'LABORATORIUM';
        $ruangan->save();

        $ruangan = new \App\Ruangan();
        $ruangan->nama = 'LAB 9';
        $ruangan->jenis = 'LABORATORIUM';
        $ruangan->save();

        $ruangan = new \App\Ruangan();
        $ruangan->nama = 'LAB 8';
        $ruangan->jenis = 'LABORATORIUM';
        $ruangan->save();
    }
}
