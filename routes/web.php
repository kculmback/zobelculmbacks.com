<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/details', 'SiteController@main')->name('details');
Route::get('/activities', 'SiteController@main')->name('activities');
Route::get('/accommodations', 'SiteController@main')->name('accommodations');
Route::get('/registry', 'SiteController@main')->name('registry');
Route::get('/rsvp', 'SiteController@main')->name('rsvp');
Route::fallback('SiteController@main');
