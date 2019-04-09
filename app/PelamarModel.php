<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PelamarModel extends Model
{
    protected $table = "lamaran";
    protected $primaryKey = "id_Lamaran";
    protected $fillable = ['id_Pekerjaan', 'id_BadanUsaha', 'nama', 'email', 'phone', 'alamat', 'foto', 'ktp', 'skck', 'ktm', 'sks'];

    public function pekerjaan()
    {
        return $this->belongsTo('App\PekerjaanModel', 'id_Pekerjaan', 'id_Pekerjaan');
    }

    public function badanUsaha()
    {
        return $this->belongsTo('App\BadanUsahaModel', 'id_BadanUsaha','id_BadanUsaha');
    }
}
