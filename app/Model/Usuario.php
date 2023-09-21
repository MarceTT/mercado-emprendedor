<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name ', 'email', 'password', 'type', 'access', 'descarga'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
}
