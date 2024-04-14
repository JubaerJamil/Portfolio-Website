<?php

namespace App\Http\Controllers;

use App\Models\Resume_educations;
use Exception;
use Illuminate\Http\Request;

class ResumeEduController extends Controller
{

    function resumeEduFontPage(Request $request){
        return view('pages.back-end-page.academic-education.academicEdu-page');
    }

    function createResumeEdu(Request $request){
        try{
            Resume_educations::create([
                'summary' => $request->input('summary'),
                'course_name' => $request->input('course_name'),
                'passing_year' => $request->input('passing_year'),
                'institute_name' => $request->input('institute_name'),
                'gpa' => $request->input('gpa')
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

    function updateResumeEdu(Request $request){
        try{
            $resumeEduId = $request->input('id');
            Resume_educations::where('id', $resumeEduId)->update([
                'summary' => $request->input('summary'),
                'course_name' => $request->input('course_name'),
                'passing_year' => $request->input('passing_year'),
                'institute_name' => $request->input('institute_name'),
                'gpa' => $request->input('gpa')
            ]);
            return response()->json([
                "status" => "success",
                "message" => "Resume Education update successfully done"
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                "status" => "failed",
                "message" => "Update request failed"
            ],400);
        }
    }

    function deleteResumeEdu(Request $request){
        try{
            $resumeEduId = $request->input('id');
            Resume_educations::where('id', $resumeEduId)->delete();
            return response()->json([
                "status" => "success",
                "message" => "Resume Education delete successful"
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                "status" => "failed",
                "message" => "Delete request failed"
            ],400);
        }
    }

    function resumeEduUpdateById(Request $request){
        $resumeEduId = $request->input('id');
        return  Resume_educations::where('id', $resumeEduId)->first();
    }

    function resumeEduList(Request $request){
        return Resume_educations::all();
    }




}
