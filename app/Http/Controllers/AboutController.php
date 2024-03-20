<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    function aboutItemList(Request $request){
        return view('pages.back-end-page.about.about-page');
    }



    function createabout(Request $request){
        try{
            $user_id = $request->header('id');
            $img = $request->file('img_url');
            $time = time();
            $original_name = $img->getClientOriginalName();
            $file_name = "{$time}-{$original_name}";
            $img_url = "uploads/$file_name";

            // move file
        $img->move(public_path('uploads'),$img_url);


        About::create([
            'about_info' => $request->input('about_info'),
            'about_title' => $request->input('about_title'),
            'about_details' => $request->input('about_details'),
            'birthday' => $request->input('birthday'),
            'phone_number' => $request->input('phone_number'),
            'current_city_name' => $request->input('current_city_name'),
            'email' => $request->input('email'),
            'freelancer' => $request->input('freelancer'),
            'birth_place' => $request->input('birth_place'),
            'img_url' =>$img_url,
            'user_id' => $user_id
        ]);
        return response()->json([
            "status" => "success",
            "message" => "Request successful"
        ],200);
        }
        catch(Exception $e){
            return response()->json([
                "status" => "Faild",
                "message" => "Request Failed"
            ],400);
                // return $e->getMessage();
        }
    }

    function updateabout(Request $request){
        $user_id = $request->header('id');

        if ($request->hasFile('img_url')){
            $img = $request->file('img_url');
            $time = time();
            $original_name = $img->getClientOriginalName();
            $file_name = "{$time}-{$original_name}";
            $img_url = "uploads/$file_name";

            // move file
        $img->move(public_path('uploads'),$img_url);

            return About::where('user_id', $user_id)->update([
                'about_info' => $request->input('about_info'),
                'about_title' => $request->input('about_title'),
                'about_details' => $request->input('about_details'),
                'birthday' => $request->input('birthday'),
                'phone_number' => $request->input('phone_number'),
                'current_city_name' => $request->input('current_city_name'),
                'email' => $request->input('email'),
                'freelancer' => $request->input('freelancer'),
                'birth_place' => $request->input('birth_place'),
                'img_url' => $img_url
            ]);
        }
        else{
            return About::where('user_id', $user_id)->update([
                'about_info' => $request->input('about_info'),
                'about_title' => $request->input('about_title'),
                'about_details' => $request->input('about_details'),
                'birthday' => $request->input('birthday'),
                'phone_number' => $request->input('phone_number'),
                'current_city_name' => $request->input('current_city_name'),
                'email' => $request->input('email'),
                'freelancer' => $request->input('freelancer'),
                'birth_place' => $request->input('birth_place')
            ]);
        }
    }


    function deleteabout(Request $request){
        $user_id = $request->header('id');
        return About::where('user_id', $user_id)->delete();
    }

    function aboutlist(Request $request){

            $user_id = $request->header('id');
            return About::where('user_id', $user_id)->first();


    }

}







