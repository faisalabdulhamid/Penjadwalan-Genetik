<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $table = 'tahun_ajaran';
    public $timestamps = false;

    protected $fillable = ['tahun_ajaran'];

    public function scopeAktif($query)
    {
    	return $query->where('aktif', 1);
    }

    public function kelas()
    {
    	return $this->hasMany(Kelas::class, 'tahun_ajaran_id');
    }
}
