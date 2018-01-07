<?php

namespace App\Http\Controllers;

use App\Algoritma\Genetika;
use App\Algoritma\TabuList;
use App\Algoritma\Individu;
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

    public function contoh()
    {
        $semester = 2;
        $populasi = 10;
        $crossover = 0.7;
        $mutasi = 0.4;
        $generasi = 100; //pengulangan

        $genetika = new Genetika($mutasi, $crossover, $populasi);
        
        $fit = [];
        $fitness_1 = '';
        $found = false;

        $genetika->Pengkodean();
        $genetika->Inisialisasi();
        $genetika->EvaluasiFitness();
        $genetika->Seleksi();
        return($genetika->CrossOver());
        // $genetika->Mutasi();
        return ($genetika->tabu_list->tabu_individu);
        dd($genetika->tabu_list);

        for ($i=0; $i < $generasi; $i++) { 
            
            $genetika->EvaluasiFitness();
            $genetika->Seleksi();
            $genetika->CrossOver();
            $genetika->Mutasi();
            $genetika->EvaluasiFitness();

            $fit[] = $genetika->fitness->max('fitness');
            $fitness = $genetika->fitness;

            if ($fitness->max('fitness') === 1) {
                $found = true;
                $fitness_1 = [
                    $i,
                    $fitness
                ];
            }

            if($found){break;}
        }

        if ($found) {
            return [
                $genetika->tabu_list,
                $fitness_1,
                $fit];
        }else{
            return $fit;
        }
    }

}
