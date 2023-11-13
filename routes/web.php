<?php



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('app');
});

Route::post('/login', [\App\Http\Controllers\UserController::class, 'login', function(Request $request){ return $request->user(); }]);
Route::post('/requestRegistration', [\App\Http\Controllers\RegRequestController::class,
    'createRequest', function(Request $request){}]);
Route::get('/getTurnRequest', [\App\Http\Controllers\RegRequestController::class, 'getTurnRequest']);

Route::post('/saveRequest', [\App\Http\Controllers\RegRequestController::class, 'save', function(Request $request){}]);
Route::post('/composition', [\App\Http\Controllers\CompositionController::class, 'getArticle',  function(Request $request){}]);
Route::post('/compositionEdit', [\App\Http\Controllers\CompositionController::class, 'editComposition', function(Request $request){}]);
Route::post('/addNewComposition', [\App\Http\Controllers\CompositionController::class, 'addComposition', function(Request $request){}] );
Route::get('/getAllStyles', [\App\Http\Controllers\CompositionController::class, 'getAllStyles']);
Route::post('/deleteComposition', [\App\Http\Controllers\CompositionController::class, 'deleteComposition', function(Request $request){}]);

//Route::post('/login', [\App\Http\Controllers\UserController::class, 'ReadDoc'], function(){ return view('welcome');});
URL::forceScheme('https');
