<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Mail\OTPMail;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
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

    function UserProfilePage(Request $request){
        return view('pages.back-end-page.profile.profile-page');
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
                'img_url'=>$img_url
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
            ->select('id')->first();

            if($count !==null){
                $token = JWTToken::createtoken($request->input('email'),$count->id);
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

    function userprofile(Request $request){
        try{
            $email = $request->header('email');
            $user = User::where('email', '=', $email)->first();
            return response()->json([
            'status' => "success",
            'message' => "Request Successfull",
            "data" => $user
            ],200);
        }
        catch(Exception $e){
            return response()->Json([
            'status' => "Unsuccess",
            'message' => "Request Field"
            ]);
        }
    }

    // function userupdate(Request $request){
    //     try {
    //         $email = $request->header('email');

    //     if ($request->hasFile('img_url')){

    //         // new file upload
    //         $img = $request->file('img_url');
    //         $time = time();
    //         $original_name = $img->getClientOriginalName();
    //         $img_name = "{$time}-{$original_name}";
    //         $img_url = "uploads/{$img_name}";

    //         // moved image
    //         $img->move(public_path('uploads'), $img_url);

    //         //old file delete
    //         $filepath = $request->input('file_path');
    //         File::delete($filepath);

    //         //update info

    //         return User::where('email', '=', $email)->update([
    //             'first_name'=> $request->input('first_name'),
    //             'last_name'=> $request->input('last_name'),
    //             'password'=> $request->input('password'),
    //             'phone'=> $request->input('phone'),
    //             'img_url'=>$img_url
    //         ]);
    //     }
    //     else{
    //         return User::where('email', '=', $email)->update([
    //             'first_name'=> $request->input('first_name'),
    //             'last_name'=> $request->input('last_name'),
    //             'password'=> $request->input('password'),
    //             'phone'=> $request->input('phone')
    //         ]);
    //     }
    //     }
    //     catch(Exception $e){
    //         return response()->json([
    //             'Status' => "success",
    //             'Message' => "Request Successfull",
    //             ],400);
    //         // return $e->getMessage();
    //     }

    // }

    function userupdate(Request $request){
        try {
            $email = $request->header('email');

            if ($request->hasFile('img_url')){

                // new file upload
                $img = $request->file('img_url');
                $time = time();
                $original_name = $img->getClientOriginalName();
                $img_name = "{$time}-{$original_name}";
                $img_url = "uploads/{$img_name}";

                // moved image
                $img->move(public_path('uploads'), $img_url);

                //old file delete
                $filepath = $request->input('file_path');
                if ($filepath && File::exists($filepath)) {
                    File::delete($filepath);
                } else {
                    // Log error if file doesn't exist
                    Log::error("File does not exist at path: $filepath");
                }

                //update info
                $updateData = [
                    'first_name'=> $request->input('first_name'),
                    'last_name'=> $request->input('last_name'),
                    'password'=> $request->input('password'),
                    'phone'=> $request->input('phone'),
                    'img_url'=>$img_url
                ];

            } else {
                $updateData = [
                    'first_name'=> $request->input('first_name'),
                    'last_name'=> $request->input('last_name'),
                    'password'=> $request->input('password'),
                    'phone'=> $request->input('phone')
                ];
            }

            // Perform the update
            $updated = User::where('email', '=', $email)->update($updateData);

            if ($updated) {
                return response()->json([
                    'status' => "success",
                    'message' => "Request Successfully",
                ], 200);
            } else {
                return response()->json([
                    'status' => "error",
                    'message' => "Failed to update user",
                ], 400);
            }

        } catch(Exception $e) {
            // Log the exception
            // Log::error("Exception occurred: " . $e->getMessage());
            return response()->json([
                'status' => "error",
                'message' => "An error occurred while processing the request",
            ], 500);
        }
    }

}
