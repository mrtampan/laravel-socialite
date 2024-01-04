<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/github', 'App\Http\Controllers\SocialiteController@RedirectGithub')->name('auth.github');

Route::get('/auth/github/callback', 'App\Http\Controllers\SocialiteController@HandleGithubCallback')->name('auth.github.callback');
