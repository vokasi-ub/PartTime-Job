<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PekerjaanModel extends Model
{
    protected $table = "pekerjaan";
    protected $primaryKey = 'id_Pekerjaan';
    protected $fillable = ['id_BadanUsaha', 'posisi', 'jam_Kerja', 'persyaratan'];

    public function badanUsaha()
    {
        return $this->belongsTo('App\BadanUsahaModel', 'id_BadanUsaha','id_BadanUsaha');
    }

    public function pelamar()
    {
        return $this->hasMany('App\PelamarModel', 'id_Pekerjaan', 'id_Pekerjaan');
    }

}
