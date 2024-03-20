<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{

    function certificatePage(Request $request){
        return view('pages.back-end-page.certificate.certificate-page');
    }

    function certificatePageFont(Request $request){
        return view('pages.font-end-page.home-page');
    }


    function createCertificate(Request $request){

        try{

            $user_id = $request->header('id');

            $img = $request->file('img_url');
            $time = time();
            $original_name = $img->getClientOriginalName();
            $file_name = "{$user_id}-{$time}-{$original_name}";
            $img_url = "uploads/$file_name";

            // move file
            $img->move(public_path('uploads'),$file_name);

            Certificate::create([
                'img_url' => $img_url,
                'user_id' => $user_id
            ]);

            return response()->json([
                "status"=> "success",
                "message"=> "Certificate upload successfully done"
            ],200);

        }
        catch(Exception $e){
            return response()->json([
                "status" => "failed",
                "message"=> "Certificate upload failed"
            ],400);
        // return $e->getMessage();
        }
    }


    function certificateDelete(Request $request){

        try{
            $user_id = $request->header('id');
            $certificate_id = $request->input('id');
            $data = Certificate::where('user_id', $user_id)->where('id', $certificate_id)->delete();
            return response()->json([
                "status"=> "success",
                "message"=> "Certificate delete successfully done"
                // "data" => $data
            ]);
        }
        catch(Exception $e){
            return response()->json([
                "status" => "failed",
                "message"=> "Certificate delete failed"
            ],400);
            // return $e->getMessage();
        }
    }

    function certificateList(Request $request){
        $user_id = $request->header('id');
        return Certificate::where('user_id', $user_id)->get();
    }












}
