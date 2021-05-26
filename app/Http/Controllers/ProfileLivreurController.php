<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\ProfileLivreur;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileLivreurController extends Controller
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
        $profiles = ProfileLivreur::has('user')->get();
        // $profiles = ProfileLivreur::where( 'user_id' === $user_id );
        return view('livreurs.profile', compact('user', 'profiles'));
    }

    public function edit(User $user)
    {
        $profiles = ProfileLivreur::has('user')->get();
        return view('livreurs.EditProfile', compact('user', 'profiles'));
    }

    public function update(User $user)
    {

       $data = request()->validate([
            'nom' => '',
            'prenom' => '',
            'telephone' => '',
            'adresse' => '',
            'CNI' => '',
            'transport' => '',
        ]);    
        
         Auth()->user()->profileLivreur->update($data);
        // update for user
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user->update($data);

        return $this->show($user);
      
       

    }
}