<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'matakuliah';
    public $timestamps = false;

    protected $fillable = ['kode_mk', 'nama', 'sks', 'semester', 'jenis'];

    public function ketentuan()
    {
        return $this->hasMany(KetentuanMatkul::class, 'matkul_id');
    }
}
