<?php

namespace App\Http\Controllers;

use App\Models\Resume_educations;
use Exception;
use Illuminate\Http\Request;

class ResumeEduController extends Controller
{
    function createResumeEdu(Request $request){
        try{
            Resume_educations::create([
                'summary' => $request->input('summary'),
                'course_name' => $request->input('course_name'),
                'passing_year' => $request->input('passing_year'),
                'institute_name' => $request->input('institute_name'),
                'gpa' => $request->input('gpa'),
            ]);
            return response()->json([
                "status" => "success",
                "message" => "Resume Education item input successfully done"
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                "status" => "failed",
                "message" => "Input request failed"
            ],400);
        }
    }

    function resumeEduList(Request $request){
        return Resume_educations::all();
    }




}
