<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;
    protected $table = 'assets';
    protected $fillable =[
        'name',
        'fileupload',
        'price',
        'creatername',
        'coverimage',
        'is_zip',
        'status'
    ]; 
}
