<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengampu extends Model
{
    protected $table = 'pengampu';
    public $timestamps = false;

    protected $fillable = ['matkul_id', 'dosen_id', 'kelas_id', 'tahun_ajaran_id'];

    public static function boot()
    {
        
        static::creating(function($model){
            // $thn = TahunAjaran::where('aktif', 1)->first();
            // $model->tahun_ajaran_id = $thn->id;
        });
        
        parent::boot();
    }

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
