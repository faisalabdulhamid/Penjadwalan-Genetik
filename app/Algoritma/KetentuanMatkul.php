<?php

namespace App\Algoritma;

/**
* 
*/
class KetentuanMatkul
{
	public $ketentuan; // --> id_pengampu
	public $matkul;
	public $ruangan;
	
	function __construct($params)
	{
		$this->ketentuan = $params->id;//['id'];
		$this->matkul = $params->matkul_id;//['matkul_id'];
		$this->ruangan = $params->ruangan_id;//['ruangan_id'];
	}

}