<?php

namespace App\Algoritma;

/**
* 
*/
class KetentuanRuangan
{
	public $ketentuan; // --> id_pengampu
	public $ruangan;
	public $hari;
	
	function __construct($params)
	{
		
		$this->ketentuan = $params->id;
		$this->hari = $params->hari_id;
		$this->ruangan = $params->ruangan_id;
	}

}