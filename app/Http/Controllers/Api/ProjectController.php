<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    //
    public function index(Request $request){
        if($request->query('type')){
            $project = Project::where('type_id', $request->query('type'))->get();
        } else {
            $project = Project::all();
        }
        return response()->json([
            'success' => true,
            'data' => $project
        ]);
    }
    public function show($id){
        $project = Project::where('id', $id)->with(['technologies', 'type'])->first();
        return response()->json([
            'success' => true,
            'data' => $project
        ]);
    }
}
