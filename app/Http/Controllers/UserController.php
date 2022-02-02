<?php

namespace App\Http\Controllers;


use App\Events\SendInvitationMail;
use App\Mail\SendMail;
use App\Models\User;
use App\Models\UserAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database;

class UserController extends Controller
{

    public function showTeamMemberInvitationForm(Request $request){


       $roles= Role::all();
//       Role::create(['name' => 'app_admin', 'administrator','teamMember']);
        return view('pages.teammemberinvitationform',['roles'=>$roles]);
    }




    public function showAcceptInvitationFormToTeamMember(Request $request) {

        $name = $request->route('name');

        $email = $request->route('email');

        $user =User::where('email', $email)->first();

        return view('users.registration_new_user',['name' => $name, 'email' => $email , 'id' => $user->id]);

    }


    public function createPasswordForTeamMember(Request $request) {

        $this->validate($request, [
            'password' => [
                'required',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'url' => [
                'required|url',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            ],
        ]);

        $id = $request->input('id');

        $password = $request->input('password');

        User::where('id',$id)->update(['password'=> Hash::make($password)]);

        echo "Your are register Now you can Login ";
    }


    public function index()
    {
        $users = User::get();
        $roles = Role::whereNotIn('name',  ['app_admin'])->get();
        //dd($roles);
        return view('livewire.users.users')->with(['users'=>$users, 'roles' => $roles]);

    }


}


