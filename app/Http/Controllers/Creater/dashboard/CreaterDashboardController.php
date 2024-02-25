<?php

namespace App\Http\Controllers\creater\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreaterDashboardController extends Controller
{
    public function createdashboard(){

        return view('creater.dashboard.createrdashboard');
    }
}
