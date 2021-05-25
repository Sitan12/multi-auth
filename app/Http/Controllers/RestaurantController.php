<?php

namespace App\Http\Controllers;

use App\Models\Profiler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RestaurantController extends Controller
{
    
    public function index()
    {
        return view('restos.index');
    }
   
    public function create()
    {
        return view('restos.create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function store(Request $request)
    {
        $restaurant = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => 'restaurant',
            'is_admin' => 0,
            'password' => Hash::make($request['password']),
        ]);

         Profiler::create([
            'restaurant_id' => $restaurant->id,
            'categorie' => $request['categorie'],
    
        ]);

        return $this->index();
    }
    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
