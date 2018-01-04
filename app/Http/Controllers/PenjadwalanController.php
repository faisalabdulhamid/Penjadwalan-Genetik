<?php

namespace App\Http\Controllers;

use App\Algoritma\Genetika;
use App\Dosen;
use App\Hari;
use App\Jam;
use App\KetentuanDosen;
use App\KetentuanMatkul;
use App\KetentuanRuangan;
use App\Pengampu;
use App\Ruangan;
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

        //Pengkodean

        // echo $genetika->mutasi;
        // TahunAjaran::find($tahun_akademik);
        //[$kelas, $dosen, $matkul, $hari, $jam, $ruangan]
        // KROMOSOM = [gen, gen, gen, gen ...]
        // KROMOSOM = [$perkuliahan, $hari, $jam, $ruangan]

        // $perkuliahaan = [$id, $dosen, $matkul, $kelas] ---> pengampu
        // $jadwal = [$hari, $jam, $ruangan]

        // $Kromosom = [$jadwal, $perkuliahan]

    public function contoh()
    {
        $semester = 2;
        $populasi = 10;
        $crossover = 0.7;
        $mutasi = 0.4;
        $generasi = 100; //pengulangan

        $genetika = new Genetika($mutasi, $crossover, $populasi);

        $genetika->Pengkodean();
        $genetika->Inisialisasi();
        $genetika->EvaluasiFitness();
        // $max = $genetika->fitness->max('fitness');

        return $genetika->fitness;


        // return collect([$genetika->fitness])->firstWhere('fitness', $max);
        

        

        // dd($genetika->individu);
        // return $genetika->hitungFitness();

        // return $search->all();
    }

}
