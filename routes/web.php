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
Route::get('login/facebook', [SocialAuthFacebookController::class, 'redirect']);
Route::get('login/facebook/callback', [SocialAuthFacebookController::class, 'callback']);
Route::get('login/linkedin', [SocialAuthLinkedInController::class, 'redirect']);
Route::get('login/linkedin/callback', [SocialAuthLinkedInController::class, 'callback']);

