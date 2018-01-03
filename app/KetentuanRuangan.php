<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KetentuanRuangan extends Model
{
    protected $table = 'ketentuan_ruangan';
    public $timestamps = false;

    protected $fillable = ['ruangan_id', 'hari_id'];
    
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }

    public function hari()
    {
        return $this->belongsTo(Hari::class, 'hari_id');
    }
}
