<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // function homePageForMessage(Request $request){
    //     return view('pages.font-end-page.home-page');
    // }

    function messageListPage(Request $request){
        return view('pages.back-end-page.contact.cantact-page');
    }

    function receiveMessage(Request $request){
        try{
            Contact::create([
                'full_name' => $request->input('full_name'),
                'phone_number' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'message' => $request->input('message')

            ]);
            return response()->json([
                "status" => "success",
                "message" => "Request successful"
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                "status" => "failed",
                "message" => "Request failed"
            ],400);
            // return $e->getMessage();
        }
    }

    function messageList(Request $request){
        return Contact::all();
    }

    function messageDelete(Request $request){
        try{
            $messageId = $request->input('id');
            Contact::where('id', $messageId)->delete();

            return response()->json([
                "status" => "success",
                "message" => "Request success"
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                "status" => "failed",
                "message" => "Request failed"
            ],400);
        }
    }




}
