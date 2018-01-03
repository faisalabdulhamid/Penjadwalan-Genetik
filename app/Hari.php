<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    protected $table = 'hari';
    public $timestamps = false;
    protected $fillable = ['nama'];
    public function ketentuan()
    {
        return $this->hasMany(KetentuanDosen::class, 'hari_id');
    }
}
