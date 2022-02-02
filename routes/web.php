<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Http\Controllers\loginController;
use App\Http\Controllers\CampaignsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KeywordsController;


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


Route::get('dashboard', [HomeController::class, 'index'])->middleware('auth:sanctum', 'verified')->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/edits', function () {
    return view('');
})->name('dashboard');

//main controller



Route::middleware('auth')->group(function (){

    Route::get('campaigns', [CampaignsController::class, 'index']);

    Route::get('keywords', [KeywordsController::class, 'index']);

    Route::get('teammemberinvitationform', [UserController::class, 'showTeamMemberInvitationForm']);
    Route::get('users', [UserController::class, 'index']);

    Route::post('/invite-team-member', [UserController::class, 'inviteTeamMember'])->name('invite-team-member');
    Route::post('/create', [UserController::class, 'createPasswordForTeamMember']);

});

Route::get('registration/{name}/{email}', [\App\Http\Controllers\UserController::class, 'showAcceptInvitationFormToTeamMember']);

Route::get('auth/google', [\App\Http\Controllers\loginController::class, 'redirect']);

Route::get('auth/google/callback', [\App\Http\Controllers\loginController::class, 'signinGoogle']);


//change status for activiation
//Route::get('change-status',[\App\Http\Controllers\UserController::class,'changeStatus']);



/*
 *
 *
 *  TODO: do not remove the following*/
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
/**/
//for create roles
Route::get('create_roles', function () {

    Role::create(['name' => 'app_admin']);
    Role::create(['name' => 'administrator']);
    Role::create(['name' => 'teamMember']);


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
