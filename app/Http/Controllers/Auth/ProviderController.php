<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }


    public function callback($provider){

        try {
            $socialUser = Socialite::driver($provider)->user();
            if(User::where('email' , $socialUser->getEmail())->exists()){
                return redirect('/login')->withErrors(['email' => 'حسابی با این ایمیل از قبل ثبت شده است, در صورت فراموشی رمز عبور آن را بازیابی کنید']);
            }
            $user = User::where([
                'provider' => $provider,
                'provider_id'=> $socialUser->id
            ])->first();
 
            if (!$user) {
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(), 
                    'username' => User::generateUserName($socialUser->nickname),
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'provider_token' => $socialUser->token,
                    'email_verified_at' => now()
                ]);
            }
         
            Auth::login($user);
            return redirect('/home');

        } catch (\Exception $e) {
            return redirect('/login');
        }
 

    }

}
