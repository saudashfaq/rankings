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

            dd($user);

            $findUser = User::where('email', $user->email)->first();

            dd($findUser);

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

                dd($addUser, $this->user_account);
                Auth::login($addUser);
                return redirect()->intended('dashboard');
            }

        } catch (\Exception $e) {
            echo '<pre>';
            dd($e->getMessage(), $e->getCode(), $e->getLine(), $e->getFile());
        }

    }





}
