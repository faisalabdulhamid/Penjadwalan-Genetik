<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    public $timestamps = false;

    public function ketentuan()
    {
        return $this->hasMany(KetentuanDosen::class, 'dosen_id');
    }
}
