<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function dashboardpage(Request $request){
        return view('layout.back-end-layout.app');
    }

    
}
