<?php

use Illuminate\Database\Seeder;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS31271';
        $matkul->nama = 'Bahasa Inggris I';
        $matkul->sks = '2';
        $matkul->semester = '1';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS31272';
        $matkul->nama = 'Pengantar Ilmu Komputer';
        $matkul->sks = '3';
        $matkul->semester = '1';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS31273';
        $matkul->nama = 'Matematika I ';
        $matkul->sks = '3';
        $matkul->semester = '1';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS31274';
        $matkul->nama = 'Dasar Manajemen & Bisnis';
        $matkul->sks = '3';
        $matkul->semester = '1';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS31275';
        $matkul->nama = 'Algoritma & Struktur Data I';
        $matkul->sks = '3';
        $matkul->semester = '1';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS31371L';
        $matkul->nama = 'Komputer Aplikasi SI';
        $matkul->sks = '2';
        $matkul->semester = '1';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS31372L';
        $matkul->nama = 'Komputer Aplikasi IT ';
        $matkul->sks = '2';
        $matkul->semester = '1';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS32276';
        $matkul->nama = 'Bahasa Inggris II';
        $matkul->sks = '2';
        $matkul->semester = '2';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS32171';
        $matkul->nama = 'Pendidikan Agama';
        $matkul->sks = '2';
        $matkul->semester = '2';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS32277';
        $matkul->nama = 'Akuntansi';
        $matkul->sks = '3';
        $matkul->semester = '2';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS32278';
        $matkul->nama = 'Konsep Sistem Informasi';
        $matkul->sks = '3';
        $matkul->semester = '2';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS32279';
        $matkul->nama = 'Pengantar Teknologi Informasi';
        $matkul->sks = '2';
        $matkul->semester = '2';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS32373L';
        $matkul->nama = 'Lab. Komputer Akuntansi ';
        $matkul->sks = '2';
        $matkul->semester = '2';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS32374L';
        $matkul->nama = 'Lab. Pemrograman Dasar ';
        $matkul->sks = '2';
        $matkul->semester = '2';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS32172';
        $matkul->nama = 'Pancasila';
        $matkul->sks = '2';
        $matkul->semester = '2';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS33173';
        $matkul->nama = 'Kewarganegaraan';
        $matkul->sks = '2';
        $matkul->semester = '3';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS33280';
        $matkul->nama = 'Analisis Proses Bisnis';
        $matkul->sks = '2';
        $matkul->semester = '3';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS33281';
        $matkul->nama = 'Matematika 2 ';
        $matkul->sks = '3';
        $matkul->semester = '3';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS33282';
        $matkul->nama = 'Analisis & Perancangan Sistem Informasi';
        $matkul->sks = '3';
        $matkul->semester = '3';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS33283';
        $matkul->nama = 'Algoritma & Struktur Data II';
        $matkul->sks = '3';
        $matkul->semester = '3';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS33375L';
        $matkul->nama = 'Lab. Pemrograman I ';
        $matkul->sks = '2';
        $matkul->semester = '3';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS33376L';
        $matkul->nama = 'Hardware Komputer ';
        $matkul->sks = '3';
        $matkul->semester = '3';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS34284';
        $matkul->nama = 'Sistem Operasi';
        $matkul->sks = '3';
        $matkul->semester = '4';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS34285';
        $matkul->nama = 'Manajemen Sains';
        $matkul->sks = '3';
        $matkul->semester = '4';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS34286';
        $matkul->nama = 'Konsep E-Business';
        $matkul->sks = '2';
        $matkul->semester = '4';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS34287';
        $matkul->nama = 'Basis Data';
        $matkul->sks = '3';
        $matkul->semester = '4';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS34377L';
        $matkul->nama = 'Lab. Basis Data I ';
        $matkul->sks = '2';
        $matkul->semester = '4';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS34378';
        $matkul->nama = 'Analisis & Perancangan Berorientasi Objek';
        $matkul->sks = '3';
        $matkul->semester = '4';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS34379L';
        $matkul->nama = 'Lab. Pemrograman II ';
        $matkul->sks = '2';
        $matkul->semester = '4';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS35288';
        $matkul->nama = 'Statistika';
        $matkul->sks = '3';
        $matkul->semester = '5';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS35471';
        $matkul->nama = 'Manajemen Sistem Informasi';
        $matkul->sks = '3';
        $matkul->semester = '5';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS35380';
        $matkul->nama = 'Perancangan Basis Data';
        $matkul->sks = '3';
        $matkul->semester = '5';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS35381';
        $matkul->nama = 'Jaringan Komputer';
        $matkul->sks = '3';
        $matkul->semester = '5';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS35382L';
        $matkul->nama = 'Lab. Basis Data II ';
        $matkul->sks = '2';
        $matkul->semester = '5';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS35383L';
        $matkul->nama = 'Pemrograman Web ';
        $matkul->sks = '2';
        $matkul->semester = '5';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS35385L';
        $matkul->nama = 'Animasi dan Multimedia Interaktif 1';
        $matkul->sks = '2';
        $matkul->semester = '5';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS35384L';
        $matkul->nama = 'Pemrograman III ';
        $matkul->sks = '2';
        $matkul->semester = '5';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS36289';
        $matkul->nama = 'Data Mining';
        $matkul->sks = '3';
        $matkul->semester = '6';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS36385';
        $matkul->nama = 'Knowledge Management';
        $matkul->sks = '3';
        $matkul->semester = '6';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS36388A';
        $matkul->nama = 'Sistem Informasi Terdistribusi';
        $matkul->sks = '3';
        $matkul->semester = '6';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS36388B';
        $matkul->nama = 'Jaringan Komputer Lanjut';
        $matkul->sks = '3';
        $matkul->semester = '6';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS36386L';
        $matkul->nama = 'Laboratorium Statistika';
        $matkul->sks = '2';
        $matkul->semester = '6';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS36472';
        $matkul->nama = 'Rekayasa Perangkat Lunak';
        $matkul->sks = '3';
        $matkul->semester = '6';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS36387L';
        $matkul->nama = 'Pemrograman Web Lanjut ';
        $matkul->sks = '2';
        $matkul->semester = '6';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS36388L';
        $matkul->nama = 'Animasi dan Multimedia Interaktif 2';
        $matkul->sks = '2';
        $matkul->semester = '6';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS36571K';
        $matkul->nama = 'Kerja Praktek';
        $matkul->sks = '2';
        $matkul->semester = '6';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS37473';
        $matkul->nama = 'Manajemen Proyek Sistem Informasi';
        $matkul->sks = '3';
        $matkul->semester = '7';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS37389';
        $matkul->nama = 'Pengelolaan Instalasi Komputer';
        $matkul->sks = '3';
        $matkul->semester = '7';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS37391A';
        $matkul->nama = 'E-Commerce Lanjut';
        $matkul->sks = '3';
        $matkul->semester = '7';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS37391B';
        $matkul->nama = 'Pemrograman Mobile';
        $matkul->sks = '3';
        $matkul->semester = '7';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS37390';
        $matkul->nama = 'Testing dan Implementasi Sistem';
        $matkul->sks = '3';
        $matkul->semester = '7';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS37475';
        $matkul->nama = 'Kewirausahaan';
        $matkul->sks = '3';
        $matkul->semester = '7';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS37474';
        $matkul->nama = 'Metodologi  Penelitian';
        $matkul->sks = '3';
        $matkul->semester = '7';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS38478A';
        $matkul->nama = 'Sistem Pendukung Keputusan';
        $matkul->sks = '3';
        $matkul->semester = '8';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS38478B';
        $matkul->nama = 'Teknik Multimedia';
        $matkul->sks = '3';
        $matkul->semester = '8';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS38479A';
        $matkul->nama = 'Analisis Kinerja Sistem Informasi';
        $matkul->sks = '3';
        $matkul->semester = '8';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS38479B';
        $matkul->nama = 'Keamanan Sistem Informasi';
        $matkul->sks = '3';
        $matkul->semester = '8';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS38476';
        $matkul->nama = 'Etika Profesi';
        $matkul->sks = '2';
        $matkul->semester = '8';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS38572';
        $matkul->nama = 'Komputer dan Masyarakat';
        $matkul->sks = '2';
        $matkul->semester = '8';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS38477';
        $matkul->nama = 'Kecakapan Antarpersonal';
        $matkul->sks = '2';
        $matkul->semester = '8';
        $matkul->jenis = 'TEORI';
        $matkul->save();

        $matkul = new \App\Matakuliah();
        $matkul->kode_mk = 'IS38573S';
        $matkul->nama = 'Skripsi';
        $matkul->sks = '6';
        $matkul->semester = '8';
        $matkul->jenis = 'TEORI';
        $matkul->save();
    }
}
