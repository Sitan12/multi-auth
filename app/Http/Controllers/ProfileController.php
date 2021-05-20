<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;

class ProfileController extends Controller

{
    public $users;

    public function __construct()
    {
        $this->users = User::getAllUsers();
        $this->middleware('auth');
    } 

    // public function index()
    // {
    //     $user_id = Auth::user()->id;
    //     $user = User::where(['id' => $user_id]);
    //     $profile = Profile::where(['user_id' => $user_id]);
    //     $users = $this->user;
    //     return view('profiles.index', compact('profile', 'user'));
    // }

    public function show(User $user)
    {
        $user_id = Auth::user()->id;
        $profile = Profile::where(['user_id' => $user_id])->first();
    
        return view('profiles.show', compact('user'));
    }

    public function create(User $user){
       
        return view('profiles.create', compact('user'));
    }

    public function store(Request $request,User $user){
        $profile = new Profile();
        $profile->numero = $request->numero;
        $profile->adresse = $request->adresse;
        $profile->photo = 0;
        $profile->user_id = Auth::user()->id;
        $profile->save();
        return redirect()->route('profiles.show', compact('user'));
    }  

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        // $data = request()->validate([
        //     'numero' => 'required',
        //     'adresse' => 'required',
        // ]);

        // $profile->update($data);
        $user->update($request->all());
        return redirect()->route('profiles.show', $user);
    }

}
