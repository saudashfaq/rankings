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
            $findUser = User::where('email', $user->email)->first();
            if($findUser) {
                Auth::login($findUser);
                return redirect()->intended('dashboard');
            } else {

               $this->user_account= UserAccount::create([
                    'business_name'=>'a',
                    'email' =>$user->email,
                    'google_id' => $user->id,
                    'logo' => 'a',
                    'status' => 1,
                ]);
                $addUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('mypassword'),
                    'user_account_id'=> $this->user_account->id,
                ]);

                Auth::login($addUser);
                return redirect()->intended('dashboard');
            }

        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }

//            try {
//                $user = Socialite::driver('google')->user();
//            } catch (\Exception $e) {
//                return redirect('/login');
//            }
//            // only allow people with @company.com to login
//            if(explode("@", $user->email)[1] !== 'company.com'){
//                return redirect()->to('/');
//            }
//            // check if they're an existing user
//            $existingUser = User::where('email', $user->email)->first();
//            if($existingUser){
//                // log them in
//                auth()->login($existingUser, true);
//            } else {
//                // create a new user
//                $newUser                  = new User;
//                $newUser->name            = $user->name;
//                $newUser->email           = $user->email;
//                $newUser->google_id       = $user->id;
//                $newUser->password       = $user->password;
//                $newUser->save();
//                auth()->login($newUser, true);
//            }
//            return redirect()->to('dashboard');
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
