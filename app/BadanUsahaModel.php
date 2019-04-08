<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BadanUsahaModel extends Model
{
    protected $table = "badan_usaha";
    protected $primaryKey = 'id_BadanUsaha';
    protected $fillable = ['id','nama_BadanUsaha', 'alamat', 'nomor_telp', 'website', 'tgl_Berdiri', 'email', 'social_Media'];

    public function pekerjaan()
    {
        return $this->hasMany('App\PekerjaanModel', 'id_BadanUsaha');
    }

}
