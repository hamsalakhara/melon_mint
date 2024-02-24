<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Creater extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'creater';

    protected $fillable = ['name','email','password'];

    protected $casts = [
       //'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
