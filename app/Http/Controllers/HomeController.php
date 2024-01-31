<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function homepage(Request $request){
        return view('pages.font-end-page.home-page');
    }

    function portfoliodetails(Request $request){
        return view('pages.font-end-page.portfolio-details-page');
    }

    function portfoliodetails2(Request $request){
        return view('pages.font-end-page.portfolio-details-page2');
    }

    function portfoliodetails3(Request $request){
        return view('pages.font-end-page.portfolio-details-page3');
    }

}
