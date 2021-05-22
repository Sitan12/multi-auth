<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Image;
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

    public function show(User $user)
    {
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id' === $user_id );
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
       $data = request()->validate([
            'numero' => 'required',
            'adresse' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg,jfif|max:3000',
        ]);    

        if(request('photo'))
        {
            $photoPath = request('photo')->store('photoProfile', 'public');
            $photo = Image::make(public_path("/storage/{$photoPath}"))->fit(800,800);
            $photo->save();
            // Auth()->user()->profile->update(array_merge($data, ['photo' => $photoPath]));
        }

         Auth()->user()->profile->update($data);
        
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        
        $user->update($data);
        
        return redirect()->route('profiles.show', $user);
       

    }

}
