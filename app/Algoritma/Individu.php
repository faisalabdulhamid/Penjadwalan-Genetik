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
	
	function __construct(array $params)
	{
		$this->perkuliahan = $params['perkuliahan'];
		$this->dosen = $params['dosen'];
		$this->matkul = $params['matkul'];
		$this->kelas = $params['kelas'];
		$this->hari = $params['hari'];
		$this->jam = $params['jam'];
		$this->ruangan = $params['ruangan'];
		$this->sks = $params['sks'];
	}

}