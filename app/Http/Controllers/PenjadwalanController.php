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
            'tingkat' => 'required',
            'populasi' => 'required',
            'crossover' => 'required',
            'mutasi' => 'required',
            'generasi' => 'required',
        ]);

        $fitness = [];
        $induk = [];
        $nilai_max_fitness_iterasi = [];

        $genetika = new Genetika;//($mutasi, $crossover, $populasi, $semester, json_decode($tingkat));

        $genetika->mutasi = $request->mutasi;
        $genetika->crossover = $request->crossover;
        $genetika->populasi = $request->populasi;
        $genetika->semester = $request->semester;
        $genetika->tingkat = json_decode($request->tingkat);

        
        $genetika->Pengkodean();
        $genetika->Inisialisasi();
        $penalty[] = $genetika->EvaluasiFitness();
        $fitness_max[] = $genetika->fitness->max('fitness');


        $found = false;
        for ($i=0; $i < $request->generasi; $i++) { 
            $induk[] = $genetika->Seleksi();       // Penetuan Induk Indv
            $genetika->CrossOver();
            $genetika->Mutasi();
            
            $penalty[] = $genetika->EvaluasiFitness();  // Nilai Fitness
            $fitness_max[] = $genetika->fitness->max('fitness');  // Nilai Fitness


            // $nilai_max_fitness_iterasi[] = $genetika->fitness->max('fitness');

            if ($genetika->fitness->max('fitness') === 1) {
                $found = true;
            }

            if($found){break;}
        }

        $title = '';
        $message = 'Data Tidak Ditemukan';

        if ($found) {
            $title = '';
            $message = 'Data Ditemukan';
        }

        return response()->json([
            // 'hah' => $genetika->
            'max' => $fitness_max,
            'induk' => $induk,
            'penalty' => $penalty,
            // 'message' => $message,
            // 'fitness' => $fitness,
            // 'max_fitness' => $nilai_max_fitness_iterasi
        ], 201);


    }

}
