<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Exception;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    function projectPage(Request $request){
        return view('pages.back-end-page.project.project-page');
    }


    function projectCreate(Request $request){

            try{
                $img = $request->file('img_url');
            $time = time();
            $original_name = $img->getClientOriginalName();
            $file_name = "{$time}-{$original_name}";
            $img_url = "uploads/$file_name";

            // move file
            $img->move(public_path('uploads'),$img_url);

            Project::create([
                'img_url' => $img_url,
                'project_title' => $request->input('project_title'),
                'client_name' => $request->input('client_name'),
                'client_from' => $request->input('client_from'),
                'preview_link' => $request->input('preview_link')
            ]);
            return response()->json([
                "status" => "success",
                "message" => "Request successful"
            ],200);
            }catch(Exception $e){
                return response()->json([
                    "status" => "Failed",
                    "message" => "Request Failed"
                ],400);
                    // return $e->getMessage();
            }
        }

        function projectUpdate(Request $request){
                    $project_Id = $request->input('id');
            try{
                if ($request->hasFile('img_url')){
                    $img = $request->file('img_url');
                    $time = time();
                    $original_name = $img->getClientOriginalName();
                    $file_name = "{$time}-{$original_name}";
                    $img_url = "uploads/$file_name";

                    // move file
                $img->move(public_path('uploads'),$img_url);

                return Project::where('id', $project_Id)->update([
                    'img_url' => $img_url,
                    'project_title' => $request->input('project_title'),
                    'client_name' => $request->input('client_name'),
                    'client_from' => $request->input('client_from'),
                    'preview_link' => $request->input('preview_link')
                    ]);
                }
                else{
                return Project::where('id', $project_Id)->update([
                    'project_title' => $request->input('project_title'),
                    'client_name' => $request->input('client_name'),
                    'client_from' => $request->input('client_from'),
                    'preview_link' => $request->input('preview_link')
                    ]);
                }
            }
            catch(Exception $e){
                return response()->json([
                    "status" => "Failed",
                    "message" => "Request Failed"
                ],400);
                    // return $e->getMessage();
            }

        }

        function projectDelete(Request $request){
            $project_Id = $request->input('id');
            try{
                Project::where('id', $project_Id)->delete();
                return response()->json([
                    "status" => "success",
                    "message" => "Item successful delete"
                ],200);
            }
            catch(Exception $e){
                return response()->json([
                    "status" => "Failed",
                    "message" => "Delete request Failed"
                ],400);
                    // return $e->getMessage();
            }
        }

        function projectList(Request $request){
            return Project::all();
        }

        function project_Update_By_Id(Request $request){
            $project_Id = $request->input('id');
            return Project::where('id', $project_Id)->first();
        }

}
