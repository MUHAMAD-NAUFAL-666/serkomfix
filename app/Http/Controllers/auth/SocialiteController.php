<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect() 
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback() 
    {
        try {
            $socialUser = Socialite::driver('google')->user();
            
            $registeredUser = User::where("google_id", $socialUser->id)->first();
            
            if (!$registeredUser) {
                $user = User::create([
                    'google_id' => $socialUser->id,
                    'name' => $socialUser->name,
                    'email' => $socialUser->email,
                    'password' => bcrypt('password'), // Tambahkan default password
                    'google_token' => $socialUser->token,
                    'google_refresh_token' => $socialUser->refreshToken,
                    'email_verified_at' => now(),
                ]);
                Auth::login($user);
                return redirect('/dashboard');
            }
            

            Auth::login($registeredUser);
            return redirect('/dashboard');

        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Google login failed');
        }
    }
}