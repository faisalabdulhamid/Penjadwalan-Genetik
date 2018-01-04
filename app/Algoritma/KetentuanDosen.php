<?php

namespace App\Algoritma;

/**
* 
*/
class KetentuanDosen
{
	public $ketentuan; // --> id_pengampu
	public $dosen;
	public $hari;
	public $jam;
	public $bobot;
	
	function __construct($params)
	{
		
		$this->ketentuan = $params->id;//['id'];
		$this->dosen = $params->dosen_id;//['dosen_id'];
		$this->hari = $params->hari_id;//['hari_id'];
		$this->jam = $params->jam_id;//['jam_id'];
		$this->bobot = $params->bobot_fitness;//['bobot_fitness'];
	}

}