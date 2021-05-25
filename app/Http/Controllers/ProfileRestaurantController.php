<?php

namespace App\Http\Controllers;

use App\Models\Profiler;
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
        $profiler = Profiler::where('restaurant_id' === $user_id );
        return view('restos.profile', compact('user', 'profiler'));
    }

    public function edit(User $user)
    {
        return view('restos.EditProfile', compact('user'));
    }
}
