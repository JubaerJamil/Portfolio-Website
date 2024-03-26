<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class SkillController extends Controller
{

    function skillListPage(Request $request){
        return view('pages.back-end-page.skill.skill-page');
    }

    function skillInput(Request $request){
        try{
            Skills::create([
                'skill_name' => $request->input('skill_name'),
                'show_percentage' => $request->input('show_percentage'),
                'skill_percentage' => $request->input('skill_percentage'),
            ]);
            return response()->json([
                "status" => "success",
                "message" => "Skill input successfully done"
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                "status" => "failed",
                "message" => "Input request failed"
            ],400);
            // return $e->getMessage();
        };
    }


    function skillUpdate(Request $request){
        try{
            $skill_Id = $request->input('id');
            Skills::where('id', $skill_Id)->update([
                'skill_name' => $request->input('skill_name'),
                'show_percentage' => $request->input('show_percentage'),
                'skill_percentage' => $request->input('skill_percentage'),
            ]);

            return response()->json([
                "status" => "success",
                "message" => "Skill Update successfully done"
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                "status" => "failed",
                "message" => "Update request failed"
            ],400);
            // return $e->getMessage();
        };
    }

    function skillDelete(Request $request){

        try{
            $skill_Id = $request->input('id');
            Skills::where('id', $skill_Id)->delete();
            return response()->json([
                "status" => "success",
                "message" => "Skill delete successfully done"
            ],200);
        }
        catch(Exception $e){
            return response()->json([
                "status" => "failed",
                "message" => "Delete request failed"
            ],400);
            // return $e->getMessage();
        }
    }


    function skillUpdateById(Request $request){
        $skill_Id = $request->input('id');
        return Skills::where('id', $skill_Id)->first();
    }

    function skillList(Request $request){
        return Skills::all();
    }


}
