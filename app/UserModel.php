<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = 'id_User';
    protected $fillable = ['nama', 'username', 'password', 'level'];

    // public function movies()
    // {
    //     return $this->hasMany('App\Movies', 'id_category');
    // }
}
