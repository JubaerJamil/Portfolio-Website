<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Resume_pro_educations;

class ResumeProEduController extends Controller
{
    function proEduPage(Request $request){
        return view('pages.back-end-page.pro-education.pro-edu-page');
    }

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

    function updateResumeProEdu(Request $request){
        try{
            $resumeProEduId = $request->input('id');
            Resume_pro_educations::where('id', $resumeProEduId)->update([

                'course_name' => $request->input('course_name'),
                'passing_year' => $request->input('passing_year'),
                'institute_name' => $request->input('institute_name'),
                'mentor_name1' => $request->input('mentor_name1'),
                'mentor_name2' => $request->input('mentor_name2')
            ]);
            return response()->json([
                "status" => "success",
                "message" => "Resume Pro Education Item update successfully done"
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
            $resumeProEduId = $request->input('id');
            Resume_pro_educations::where('id', $resumeProEduId)->delete();
            return response()->json([
                "status" => "success",
                "message" => "Resume pro education item delete successful"
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                "status" => "failed",
                "message" => "Delete request failed"
            ],400);
        }
    }

    function resumeProEduUpdateById(Request $request){
        $resumeProEduId = $request->input('id');
        return  Resume_pro_educations::where('id', $resumeProEduId)->first();
    }

    function createResumeProEduList(Request $request){
        return Resume_pro_educations::all();
    }




}
