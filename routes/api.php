<?php

// use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'Auth\LoginController@login');

Route::post('/songs', 'SongsController@add');

Route::prefix('/rsvp')->group(function () {
    Route::get('/search', 'RsvpController@search');
    Route::get('/{invite}', 'RsvpController@getInvite');
    Route::post('/{invite}', 'RsvpController@updateInvite');
});

Route::middleware('auth:api')->group(function () {
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::resource('invites', 'Admin\InviteController');
    Route::get('/guests', 'Admin\GuestController@index');
    Route::get('/guests/count', 'Admin\GuestController@getCount');
});

Route::post('stripe', 'StripeController@payment');
