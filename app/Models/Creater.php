<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authorizable;


class Creater extends Authorizable
{
    use HasFactory,SoftDeletes;

    protected $table = 'creater';

    protected $fillable = ['name','email','password'];

    protected $casts = [
       //'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
