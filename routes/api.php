<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAPiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("data",[UserAPiController::class,'gettingData']);
Route::get("dataform",[UserAPiController::class,'index']);
Route::get("datalist",[UserAPiController::class,'getData']);
// Route::post("datapost",[UserAPiController::class,'addData']);
Route::post("post_sap",[UserAPiController::class,'sapconnect']);




