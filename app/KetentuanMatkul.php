<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KetentuanMatkul extends Model
{
    protected $table = 'ketentuan_matkul';
    public $timestamps = false;

    public function matkul()
    {
        return $this->belongsTo(Matakuliah::class, 'matkul_id');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }
}
