<?php

namespace App\Http\Controllers;

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
        $profile = ProfileLivreur::where('livreur_id' === $user_id );
        return view('livreurs.profile', compact('user'));
    }

    public function edit(User $user)
    {
        return view('livreurs.EditProfile', compact('user'));
    }
}
