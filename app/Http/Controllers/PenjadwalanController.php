<?php

namespace App\Http\Controllers;

use App\Algoritma\Genetika;
use App\Hari;
use App\Jam;
use App\Kelas;
use App\KetentuanDosen;
use App\KetentuanMatkul;
use App\KetentuanRuangan;
use App\Pengampu;
use App\Ruangan;
use App\TahunAjaran;
use Illuminate\Http\Request;

class PenjadwalanController extends Controller
{
    
    public function penjadwalan(Request $request){
        $this->validate($request, [
            'semester' => 'required',
            'tahun_akademik' => 'required',
            'populasi' => 'required',
            'crossover' => 'required',
            'mutasi' => 'required',
            'generasi' => 'required',
        ]);
        $semester = $request->semester;
        $tahun_akademik = $request->tahun_akademik;
        $populasi = $request->populasi;
        $crossover = $request->crossover;
        $mutasi = $request->mutasi;
        $generasi = $request->generasi;

        

        //params($jenis_semester, $tahun_akademik, $populasi, $crossOver, $mutasi, $kode_jumat, $range_jumat, $kode_dhuhur)
        $genetika = new Genetika();

        // return $genetika;
    }

    public function contoh()
    {
        $semester = 2;
        // $tahun_akademik = 1;
        $populasi = 10;
        $crossover = 0.7;
        $mutasi = 0.4;
        $generasi = 100; //pengulangan

        $genetika = new Genetika($mutasi, $crossover, $populasi);

        //Pengkodean

        // echo $genetika->mutasi;
        // TahunAjaran::find($tahun_akademik);
        //[$kelas, $dosen, $matkul, $hari, $jam, $ruangan]
        $kelas = Kelas::has('tahunAjaran')->whereHas('tahunAjaran', function($query){
            $query->aktif();
        })->get();

        $pengampu = Pengampu::whereHas('kelas.tahunAjaran', function($q){
            $q->aktif();
        })->get();

        $jam = Jam::all();

        $hari = Hari::all();

        $ruangan_teori = Ruangan::where('jenis', 'TEORI')->get();
        $ruangan_praktikum = Ruangan::where('jenis', 'LABORATORIUM')->get();

        $ketentuan_dosen = KetentuanDosen::all();
        $ketentuan_matkul = KetentuanMatkul::all();
        $ketentuan_ruangan = KetentuanRuangan::all();

        return $ketentuan_ruangan;
    }

}
