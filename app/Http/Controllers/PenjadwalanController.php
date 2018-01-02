<?php

namespace App\Http\Controllers;

use App\Algoritma\Genetika;
use Illuminate\Http\Request;

class PenjadwalanController extends Controller
{
    private $genetika;

    public function __construct()
    {


    }
    public function index()
    {
        return view('penjadwalan.index');
    }

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

        $data = [];

        //params($jenis_semester, $tahun_akademik, $populasi, $crossOver, $mutasi, $kode_jumat, $range_jumat, $kode_dhuhur)
        $this->genetika = new Genetika($semester, $tahun_akademik, $populasi, $crossover, $mutasi, 5, '7-8', 5);
        $this->genetika->ambilData();
        $this->genetika->inisialisasi();

//        return $this->genetika->print_data();
        $found = false;
        $iterasi = 0;
        for($i=0; $i<$generasi; $i++)
        {
            $iterasi += 1;

            $fitness = $this->genetika->hitungFitness();
            $this->genetika->seleksi($fitness);
            $this->genetika->startCrossOver();

            $fitnessAfterMutation = $this->genetika->Mutasi();
            $data['fitness'] = $fitness;
            $data['fitnessAfterMutation'] = $fitnessAfterMutation;

            for($j=0; $j<count($fitnessAfterMutation); $j++)
            {
                if($fitnessAfterMutation[$j] == 1)
                {
                    $jadwal_kuliah = array(array());
                    $jadwal_kuliah = $this->genetika->GetIndividu($j);
                    $data['jadwal_kuliah'] = $jadwal_kuliah;
                    $data['iterasi'] = $iterasi;
                    $found = true;
                }

                if($found){break;}
            }
            if($found){break;}
        }

        if(!$found){
            $data['msg'] = 'Tidak Ditemukan Solusi Optimal';
        }


        return $data;
//        return $this->genetika->print_data();
    }

}
