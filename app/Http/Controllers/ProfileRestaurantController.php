<?php

namespace App\Http\Controllers;

use App\Models\ProfileRestaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileRestaurantController extends Controller
{
    public $users;

    public function __construct()
    {
        $this->users = User::getAllUsers();
        $this->middleware('auth');
    } 

    public function show(User $user)
    {
        $user_id = Auth::user()->id;
        $profiles = ProfileRestaurant::has('user')->get();
        // $profiler = ProfileRestaurant::where('user_id' === $user_id );
        return view('restos.profile', compact('user', 'profiles'));
    }

    public function edit(User $user)
    {
        $profiles = ProfileRestaurant::has('user')->get();
        return view('restos.EditProfile', compact('user', 'profiles'));
    }

    public function update(User $user)
    {
       $data = request()->validate([
            'adresse' => '',
            'telephone' => '',
            'socialnetwork' => '',
            'categorie' => '',
        ]);    
        
         Auth()->user()->profileRestaurant->update($data);
         
        // update for user
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user->update($data);

        return $this->show($user);

    }
}
