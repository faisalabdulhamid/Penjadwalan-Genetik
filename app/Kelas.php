<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    public $timestamps = false;

    protected $fillable = ['kelas'];

    public static function boot()
    {
    	static::creating(function($model){
    		$thn = TahunAjaran::where('aktif', 1)->first();
    		$model->tahun_ajaran_id = $thn->id;
    	});
    	parent::boot();
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id');
    }

    public function pengampu()
    {
        return $this->hasMany(Pengampu::class, 'kelas_id');
    }

    public function scopeHasPengampu($q)
    {
        return $this->has('pengampu', 0);
    }
}
