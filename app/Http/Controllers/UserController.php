<?php

namespace App\Http\Controllers;


use App\Events\SendInvitationMail;
use App\Mail\SendMail;
use App\Models\User;
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
    //
    public function showTeamMemberInvitationForm(Request $request){


       $roles= \App\Models\Role::all();
      //  Role::create(['name' => 'app_admin', 'administrator','teamMember']);
        return view('pages.teammemberinvitationform',['roles'=>$roles]);
    }

    public function createTeamMember(Request $request){
        {

            $this->validate($request, [
                'name'     =>  'required',
                'email'  =>  'required|email',
                'url' => [
                    'required|url',
                    'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
                ],

            ]);
            $name = $request->input('name');
            $email = $request->input('email');

            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->user_send_invitation='1';
            $user->save();

            $user->assignRole($request->input('role'));

            event(new SendInvitationMail($user));
            return back()->with('success', 'Your Invitation Will be Send!' );
        }

        //store data in DB
        //assign role
        //Event sendInvitationToTeamMember ok
        //URL should encrypted, validate 60 minutes validity
        //URL would have user id ok

    }

    public function showAcceptInvitationFormToTeamMember(Request $request) {

        $name = $request->route('name');
        $email = $request->route('email');

        $user =User::where('email', $email)->first();

        return view('pages.registration',['name' => $name, 'email' => $email , 'id' => $user->id]);

        //validate secure URL okk
        //get user id from url ok
        //get detail from DB or this user id ok
        //show this detail on form ok


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


    //validate request ok

        //valid password should be 8 chracters long and should have one special character) ok

        //make password hash and store in DB ok
        //now if team member wants to login, he should be ok



    public function index()

    {
        $users = User::get();

        return view('pages.user',compact('users'));

    }
//    /**
//     * Show the application dashboard.
//     *
//     * @return \Illuminate\Http\Response
//     */
//
//    public function show($id) {
//        $users = DB::select('select * from users where id = ?',[$id]);
//        return view('pages.edit-users',['users'=>$users]);
//    }
//    public function edit(Request $request,$id) {
//        $name = $request->input('name');
//        $email = $request->input('email');
//
//        DB::update('update users set name = ?,email=? where id = ?',[$name,$email,$id]);
//        echo "Record updated successfully.";
//    }
//    public function destroy($id) {
//        DB::delete('delete from users where id = ?',[$id]);
////        echo "Record deleted successfully.";
//        return redirect('/pages.user');
//    }




}


