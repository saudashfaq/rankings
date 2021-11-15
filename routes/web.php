<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Http\Controllers\CampaignsController;
use App\Http\Controllers\UserController;


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

//middleware(['auth:sanctum', 'verified'])->
//for jetstream
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.admin');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/edits', function () {
    return view('');
})->name('dashboard');

//main controller
Route::get('dashboard', [\App\Http\Controllers\HomeController::class, 'index']);

//for create compaigns
Route::get('campaigns', [\App\Http\Controllers\CampaignsController::class, 'index']);
//Route::get('Createcompaigns', [\App\Http\Controllers\CampaignsController::class, 'create']);

//for user control
Route::get('teammemberinvitationform', [\App\Http\Controllers\UserController::class, 'showTeamMemberInvitationForm']);
Route::get('users', [\App\Http\Controllers\UserController::class, 'index']);
//Route::get('delete/{id}',[\App\Http\Controllers\UserController::class,'destroy']);
//Route::get('edit/{id}',[\App\Http\Controllers\UserController::class,'show']);
//Route::post('edit/{id}',[\App\Http\Controllers\UserController::class,'edit']);
//for user registration after send invitation
Route::get('registration/{name}/{email}', [\App\Http\Controllers\UserController::class, 'showAcceptInvitationFormToTeamMember']);
Route::post('/create', [\App\Http\Controllers\UserController::class, 'createPasswordForTeamMember']);
//for mail invitation
//Route::get('/sendemail/send',[\App\Http\Controllers\SendEmailController::class,'sendInvitationToTeamMember']);
Route::get('/sendemail/send', [\App\Http\Controllers\UserController::class, 'createTeamMember']);


Route::get('auth/google', [\App\Http\Controllers\loginController::class, 'redirect']);

Route::get('auth/google/callback', [\App\Http\Controllers\loginController::class, 'signinGoogle']);

//Route::get('auth/facebook', [\App\Http\Controllers\loginController::class, 'redirectToFacebook']);
//
//Route::get('auth/facebook/callback', [\App\Http\Controllers\loginController::class, 'signinFacebook']);


////change status for activiation
//Route::get('change-status',[\App\Http\Controllers\UserController::class,'changeStatus']);

//Route::view('users','livewire.home');

//for create roles
Route::get('create_roles', function () {

    \App\Models\Role::create(['name' => 'app_admin']);
    \App\Models\Role::create(['name' => 'administrator']);
    \App\Models\Role::create(['name' => 'teamMember']);


    echo "Your Role Is Created";
});

Route::get('create_permission', function () {


    \App\Models\Premission::create(['name' => 'add campaign']);
    \App\Models\Premission::create(['name' => 'view campaign']);
    \App\Models\Premission::create(['name' => 'edit campaign']);
    \App\Models\Premission::create(['name' => 'delete campaign']);
    \App\Models\Premission::create(['name' => 'add user']);
    \App\Models\Premission::create(['name' => 'view user']);
    \App\Models\Premission::create(['name' => 'edit user']);
    \App\Models\Premission::create(['name' => 'delete user']);

    echo "Your Permission Is Created";
});



//Route::get('assign_role', function (){
//
//    $user = User::find(1);
//
//    $role = \App\Models\Role::where('name', 'admin')->firstorfail()->name;
//    $user->assignRole($role);
//
//});

//Route::group(['middleware' => ['role:Admin']], function () {
//
//});
//
