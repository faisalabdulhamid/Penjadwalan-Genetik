<?php

namespace App\Algoritma;

/**
* 
*/
class Individu
{
	public $perkuliahan; // --> id_pengampu
	public $dosen;
	public $matkul;
	public $kelas;
	
	public $hari;
	public $jam;
	public $ruangan;

	public $sks; //--> Tambahan
	public $jenis; //--> Tambahan
	
	function __construct($params)
	{
		$this->perkuliahan = $params->perkuliahan;//['perkuliahan'];
		$this->dosen = $params->dosen;//['dosen'];
		$this->matkul = $params->matkul;//['matkul'];
		$this->kelas = $params->kelas;//['kelas'];
		$this->hari = $params->hari;//['hari'];
		$this->jam = $params->jam;//['jam'];
		$this->ruangan = $params->ruangan;//['ruangan'];
		$this->sks = $params->sks;//['sks'];
		$this->jenis = $params->jenis;//['sks'];
	}

}