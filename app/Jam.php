<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    protected $table = 'jam';
    public $timestamps = false;

    public function ketentuan()
    {
        return $this->hasMany(KetentuanDosen::class, 'jam_id');
    }
}
