<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profiles/{user}', 'App\Http\Controllers\ProfileController@show')->name('profiles.show');
Route::get('/profiles/{user}/edit',  'App\Http\Controllers\ProfileController@edit')->name('profiles.edit');
Route::patch('/profiles/{user}',  'App\Http\Controllers\ProfileController@update')->name('profiles.update');


Route::resource('restos', 'App\Http\Controllers\RestaurantController');

Route::resource('livreurs', 'App\Http\Controllers\LivreurController');


Route::resource('clients', 'App\Http\Controllers\ClientController');
// Route::get('/clients', 'App\Http\Controllers\ClientController@profile')->name('clients.profile');

Route::resource('isadmins', 'App\Http\Controllers\IsAdminController')->middleware('App\Http\Middleware\IsAdmin');









