<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialLoginController extends Controller
{
    public function gotogoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function apigooglestore()
    {
        $socialUser = Socialite::driver('google')->user();

        $user = User::where('sid', $socialUser->id)->first();
        if ($user == null) {
            $store = new User();
            $store->email = $socialUser->email;
            $store->sid = $socialUser->id;
            $store->save();
            $sid = $socialUser->id;
             return view("auth.setpassword",compact('sid'));



        } else {
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        }
    }

    public function updatePassword(Request $request,$sid){
            $user = User::where('sid',$sid)->first();
            $user->name = $request->name;
            $user->password =Hash::make($request->password);
            $user->update();
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
    }
}
