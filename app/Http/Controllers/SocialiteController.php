<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function RedirectGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function HandleGithubCallback()
    {
        $githubUser = Socialite::driver('github')->user();


        $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ],[
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'password' => bcrypt(Str::random(24)),
            'github_username' => $githubUser->nickname,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);



        Auth::login($user);

        return redirect('/');
    }
}
