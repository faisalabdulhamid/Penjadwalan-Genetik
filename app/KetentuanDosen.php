<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KetentuanDosen extends Model
{
    protected $table = 'ketentuan_dosen';
    public $timestamps = false;

    protected $fillable = ['dosen_id', 'hari_id', 'jam_id'];

    public function dosen()
    {
    	return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function hari()
    {
    	return $this->belongsTo(Hari::class, 'kelas_id');
    }

    public function jam()
    {
    	return $this->belongsTo(Jam::class, 'jam_id');
    }
}
