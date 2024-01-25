<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TypesController;
use App\Http\Controllers\Api\LeadController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::Get('/projects', [ProjectController::class,'index']);
Route::Get('/projects/{id}', [ProjectController::class,'show']);

Route::Get('/types', [TypesController::class,'index']);
Route::Post('/contacts', [LeadController::class,'store']);


