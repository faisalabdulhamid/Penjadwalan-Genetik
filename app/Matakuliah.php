<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'matakuliah';
    public $timestamps = false;

    public function ketentuan()
    {
        return $this->hasMany(KetentuanMatkul::class, 'matkul_id');
    }
}
