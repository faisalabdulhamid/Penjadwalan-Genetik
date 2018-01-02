<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengampu extends Model
{
    protected $table = 'pengampu';
    public $timestamps = false;

    public function matkul()
    {
        return $this->belongsTo(Matakuliah::class, 'matkul_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
