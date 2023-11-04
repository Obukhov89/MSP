<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::get('/login', [\App\Http\Controllers\UserController::class, 'ReadDoc']);

Route::post('upload', "App\Http\Controllers\CompositionController@addComposition");
Route::middleware(['auth:api'])->group(function () {
	Route::post('/login', [\App\Http\Controllers\UserController::class, 'login', function(Request $request){
    return $request->user();
	}]);
	Route::middleware('auth:sanctum')->get('/login', function (Request $request) {
    		return $request->user();
	});
});

