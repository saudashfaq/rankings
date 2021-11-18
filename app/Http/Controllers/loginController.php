<?php

namespace App\Http\Controllers;

use App\Models\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;

class loginController extends Controller
{
    //

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function signinGoogle()
    {
        try {

            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->intended('dashboard');
            } else {

//                UserAccount::create([
//                    'business_name'=>'a',
//                    'email' =>$user->email,
//                    'logo' => 'a',
//                    'status' => 1,
//                ]);
                $addUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('mypassword')
                ]);

                Auth::login($addUser);
                return redirect()->intended('dashboard');
            }

        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }


//    //for facebook
//    public function redirectToFacebook()
//    {
//        return Socialite::driver('facebook')->redirect();
//    }
//
//    public function signinFacebook()
//    {
//        try {
//            $user = Socialite::driver('facebook')->user();
//            $findUser = User::where('facebook_id', $user->id)->first();
//
//            if ($findUser) {
//                Auth::login($findUser);
//                return redirect('/redirects');
//            } else {
//                $addUser = User::create([
//                    'name' => $user->name,
//                    'email' => $user->email,
//                    'facebook_id' => $user->id,
//                    'password' => encrypt('mypasswords')
//                ]);
//
//                Auth::login($addUser);
//                return redirect('/redirects');
//            }
//
//        } catch (\Exception $e) {
//            dd($e->getMessage());
//        }
//    }
}
