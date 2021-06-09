<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Models\Plats;
use App\Models\User;
use App\Models\Notifications;
use Illuminate\Support\Facades\Auth;

Route::get('/', function (Plats $plats, User $user) {
    
    $plats = Plats::all();
    $user = User::all();
    return view('welcome', compact('plats','user'));
});

Route::get('/app', function (Notifications $notifications) {
    
        $recipient= Auth::user()->id;
        $notifications = Notifications::where('recipient', $recipient)->get();
        return view('layouts.app', compact('notifications'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profiles/{user}', 'App\Http\Controllers\ProfileController@show')->name('profiles.show');
Route::get('/profiles/{user}/edit',  'App\Http\Controllers\ProfileController@edit')->name('profiles.edit');
Route::put('/profiles/{user}',  'App\Http\Controllers\ProfileController@update')->name('profiles.update');

Route::get('/restaurant/profile/{user}', 'App\Http\Controllers\ProfileRestaurantController@show')->name('restaurant.profile');
Route::get('/restaurant/{user}/editProfile',  'App\Http\Controllers\ProfileRestaurantController@edit')->name('restaurant.EditProfile');
Route::patch('/restaurant/{user}',  'App\Http\Controllers\ProfileRestaurantController@update')->name('restaurant.updateProfile');
Route::post('/restaurant/plats',  'App\Http\Controllers\RestaurantController@addFood')->name('restaurant.addFood');
Route::resource('restaurant', 'App\Http\Controllers\RestaurantController');

Route::get('/livreur/profile/{user}', 'App\Http\Controllers\ProfileLivreurController@show')->name('livreur.profile');
Route::get('/livreur/{user}/edit',  'App\Http\Controllers\ProfileLivreurController@edit')->name('livreur.EditProfile');
Route::patch('/livreur/{user}',  'App\Http\Controllers\ProfileLivreurController@update')->name('livreur.updateProfile');
Route::resource('livreur', 'App\Http\Controllers\LivreurController');

Route::get('/commande/{user}', 'App\Http\Controllers\CommandeController@createCommande')->name('commande.create');
Route::post('/commande/add', 'App\Http\Controllers\CommandeController@store')->name('commande.add');
Route::patch('/commande/{$id}', 'App\Http\Controllers\CommandeController@update')->name('commande.update');
Route::resource('commande', 'App\Http\Controllers\CommandeController');

Route::resource('clients', 'App\Http\Controllers\ClientController');

Route::get('/notification','App\Http\Controllers\NotificationController@show')->name('notification');
Route::get('/notification/delete/{id}','App\Http\Controllers\NotificationController@destroy')->name('notification.delete');
// Route::get('/app/{$id}','App\Http\Controllers\NotificationController@count')->name('notification.count');


Route::resource('isadmins', 'App\Http\Controllers\IsAdminController')->middleware('App\Http\Middleware\IsAdmin');









