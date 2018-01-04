<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    public $timestamps = false;

    protected $fillable = ['nidn', 'nama'];

    public function ketentuan()
    {
        return $this->hasMany(KetentuanDosen::class, 'dosen_id');
    }

    public function pengampu()
    {
    	return $this->hasMany(Pengampu::class, 'dosen_id');
    }
}
