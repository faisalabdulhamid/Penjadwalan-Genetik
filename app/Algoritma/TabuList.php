<?php
/**
 * Created by PhpStorm.
 * User: FAISAL ABDUL HAMID
 * Date: 14/09/2017
 * Time: 14:27
 */

namespace App\Algoritma;


class TabuList
{

	public $tabu_individu;

	public function __construct()
	{
		$this->tabu_individu = collect([]);
	}

	public function addTabulist($individu)
	{
		$this->tabu_individu->push($individu->mapInto(Individu::class));
		// $this->individu->push($individu);
	}

	public function cekInTabulist($individu)
	{
		// $result = false;
		// for ($i=0; $i < $this->; $i++) { 
		// 	# code...
		// }
		// $this->tabu_individu->each(function($pop, $i) use ($individu, &$result){
		// 	if ($result) {
		// 		return false;
		// 	}
		// 	$pop->each(function($item, $j) use($i, $pop, $individu, &$result){
		// 		$result=$pop[$i];
		// 		return false;
		// 		if (
		// 		$pop[$i][$j]->perkuliahan === $individu[$j]->perkuliahan &&
		// 		$pop[$i][$j]->hari === $individu[$j]->hari &&
		// 		$pop[$i][$j]->jam === $individu[$j]->jam &&
		// 		$pop[$i][$j]->ruangan === $individu[$j]->ruangan
		// 		// $item->dosen  === $individu->dosen &&
		// 		// $item->matkul === $individu->matkul &&
		// 		// $item->kelas === $individu->kelas &&
		// 		// $item->sks === $individm->sks &&
		// 		// $item->jenis === $individu->jenis
		// 		){
					
		// 			$result =true;
		// 			return false;
		// 		}
		// 	});
			
		// });
		// return $individu;
	}
}