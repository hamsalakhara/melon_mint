<?php

namespace App\Http\Controllers\Admin\Creaters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreaterController extends Controller
{
    public function showCreater(){

        return view('admin.creater-management.list-creater');
    }
}
