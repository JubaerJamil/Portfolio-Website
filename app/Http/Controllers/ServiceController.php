<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    function servicetable(Request $request){
        return view('pages.back-end-page.service.service-page');
    }

    function serviceList(Request $request){
        $user_id = $request->header('id');
        return Service::where('user_id',$user_id)->get();
    }

    function createService(Request $request){
        $user_id = $request->header('id');
        return Service::create([
            'service_summary' => $request->input('service_summary'),
            'service_title' => $request->input('service_title'),
            'service_details' => $request->input('service_details'),
            'user_id' => $user_id
        ]);
    }

    function serviceUpdate(Request $request){
        $user_id = $request->header('id');
        $service_id = $request->input('id');
        return Service::where('user_id', $user_id)->where('id', $service_id)->update([
            'service_summary' => $request->input('service_summary'),
            'service_title' => $request->input('service_title'),
            'service_details' => $request->input('service_details'),
        ]);
    }

    function serviceDelete(Request $request){
        $user_id = $request->header('id');
        $service_id = $request->input('id');
        return Service::where('user_id', $user_id)->where('id', $service_id)->delete();
    }

    function serviceUpdateById(Request $request){
        $user_id = $request->header('id');
        $service_id = $request->input('id');
        return Service::where('user_id', $user_id)->where('id', $service_id)->first();
    }



}
