<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';
    public $timestamps = false;

    public function ketentuan()
    {
        return $this->hasMany(KetentuanRuangan::class, 'ruangan_id');
    }
}
