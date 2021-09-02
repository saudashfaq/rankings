<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Models\User;
use App\Http\Controllers\CampaignsController;



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
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.admin');
})->name('dashboard');


Route::get('redirects' , 'App\Http\Controllers\HomeController@index');

Route::get('compaigns', [\App\Http\Controllers\CampaignsController::class, 'index']);
Route::get('Createcompaigns', [\App\Http\Controllers\CampaignsController::class, 'create']);
Route::get('user',[\App\Http\Controllers\UserController::class,'index']);

Route::group(['middleware' => ['role:Admin']], function () {

});



//Route::post('/csvToArray', [\App\Http\Controllers\CamiagnsImportController::class, 'csvToArray' ]);






//for google api
//Route::get('auth/facebook', [FbController::class, 'redirectToFacebook']);
//Route::get('auth/facebook/callback', [FbController::class, 'facebookSignin']);
//for facbook api
//Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
//Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


