<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Resume_pro_educations;

class ResumeProEduController extends Controller
{
    function createResumeProEdu(Request $request){
        try{
            Resume_pro_educations::create([
                'course_name' => $request->input('course_name'),
                'passing_year' => $request->input('passing_year'),
                'institute_name' => $request->input('institute_name'),
                'mentor_name1' => $request->input('mentor_name1'),
                'mentor_name2' => $request->input('mentor_name2'),
            ]);
            return response()->json([
                "status" => "success",
                "message" => "Resume Pro Education item input successfully done"
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                "status" => "failed",
                "message" => "Input request failed"
            ],400);
        }
    }

    function createResumeProEduList(Request $request){
        return Resume_pro_educations::all();
    }




}
