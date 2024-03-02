<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Helper\JWTToken;
use App\Mail\OTPMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    function loginpage(Request $request){
        return view('pages.back-end-page.auth.login-page');
    }

    function registrationpage(Request $request){
        return view('pages.back-end-page.auth.registration-page');
    }

    function sendotppage(Request $request){
        return view('pages.back-end-page.auth.send-otp-page');
    }

    function verifyotppage(Request $request){
        return view('pages.back-end-page.auth.verify-otp-page');
    }

    function resetpasspage(Request $request){
        return view('pages.back-end-page.auth.reset-password-page');
    }





    function userRegisteation (Request $request){

        try{
            $img = $request->file('img_url');
            $time = time();
            $original_name = $img->getClientOriginalName();
            $img_name = "{$time}-{$original_name}";
            $img_url = "uploads/{$img_name}";

            // moved image
            $img->move(public_path('uploads'), $img_url);

            User::create([
                'first_name'=> $request->input('first_name'),
                'last_name'=> $request->input('last_name'),
                'email'=> $request->input('email'),
                'password'=> $request->input('password'),    // when need hash password use this line    'password'=> bcrypt($request->input('password')),
                'phone'=> $request->input('phone'),
                'img_url'=>$img_url,
            ]);

            return response()->json([
                "status" => "success",
                "message" => "Registrations successfully"
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                "status" => "Faild",
                "message" => "Registrations Failed"
            ],400);
                // return $e->getMessage();
        };
    }

    function userlogin (Request $request){
        $count = User::where('email', '=', $request->input('email'))
            ->where('password', '=', $request->input('password'))
            ->count();

            if($count === 1){
                $token = JWTToken::createtoken($request->input('email'));
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful',
                    ],200)->cookie('token',$token,60*60*6);
            }
            else {
                return response()->json([
                    'status' => 'Failed',
                    'message' => 'Login unsuccessful',
                    ],401);
            }
    }

    function sentotp(Request $request){
        $email = $request->input('email');
        $otp = rand(1000, 9999);
        $countmail = User::where('email', '=', $email)->count();

        if ($countmail === 1){
            Mail::to($email)->send(new  OTPMail($otp));
            User::where('email', '=', $email)->update(['otp' =>$otp]);

            return response()->json([
                "status" => "success",
                "message" => "Send OTP Mail Successfully"
            ],200);
        }else{
            return response()->json([
                "status" => "Request Failed",
                "message" => "unathorized"
            ],401);
        }
    }

    function verifyotp(Request $request){
        $email = $request->input('email');
        $otp = $request->input('otp');
        $countotp = User::where('email', '=', $email)->where('otp', '=', $otp)->count();

        if($countotp == 1){
            // update otp
            User::where('otp', '=', $otp)->update(['otp'=>0]);

            // create token
            $token = JWTToken::createtokenforverify($request->input('email'));
                return response()->json([
                    'status' => 'OTP Verification Success',
                    'token' => $token
                    ],200);
        }else{
            return response()->json([
                "status" => "Verification Failed",
                "message" => "unathorized"
            ],401);
        }
    }


    function resetpassword(Request $request){

        try {
            $email = $request->header('email');
            $password = $request->input('password');
            User::where('email', $email)->update(['password'=>$password]);

        return response()->json([
            "status" => "success",
            "message" => "Password update successfully"
        ],200);

        }catch(Exception $e){
            // return $e->getMessage();
            return response()->json([
                "status" => "Field",
                "message" => "Something went wrong"
            ],401);
        }
    }

    function logout(Request $request){
        return redirect('/login')->cookie('token', '', -1);
    }




}
