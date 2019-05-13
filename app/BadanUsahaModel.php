<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BadanUsahaModel extends Model
{
    protected $table = "badan_usaha";
    protected $primaryKey = 'id_BadanUsaha';
    protected $fillable = ['id','nama_BadanUsaha', 'alamat', 'nomor_Telp', 'website', 'tgl_Berdiri', 'email', 'social_Media'];

    public function pekerjaan()
    {
        return $this->hasMany('App\PekerjaanModel', 'id_BadanUsaha', 'id_BadanUsaha');
    }

    public function pelamar()
    {
        return $this->hasMany('App\PelamarModel', 'id_BadanUsaha', 'id_BadanUsaha');
    }

}
