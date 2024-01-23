<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypesController extends Controller
{
    //
    public function index(){
        $type = Type::all();
        return response()->json([
            'success' => true,
            'data' => $type
        ]);
    }
}