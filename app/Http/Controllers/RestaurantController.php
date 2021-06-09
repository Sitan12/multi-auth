<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Livreur;
use App\Models\Plats;
use App\Models\ProfileLivreur;
use App\Models\ProfileRestaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    
    public function index()
    {
        $resto_id = Auth::user()->id;
        // $commandes = Commande::where(['restaurant_id'] == $resto_id);
        $commandes = Commande::has('user')->get();
        $users = User::all();
        return view('restos.index', compact('commandes', 'users') );
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

         ProfileRestaurant::create([
            'user_id' => $restaurant->id,
    
        ]);

        return redirect('login');
    }
    
/////////////////////////////// ADD FOOD ////////////////////

    public function addFood(Request $request)
    {
         $plat = $request->validate([
            'titre' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'image' => 'mimes:png,jpg,jpeg,jfif',
        ]);  
            $plat = new Plats();

            $plat->titre = $request->titre;
            $plat->description = $request->description;
            $plat->prix = $request->prix;
            $plat->user_id = Auth::user()->id;

        $imageName = null;
        if(request()->hasFile('image')){
            $uploadedImage = $request->file('image');
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $destinationPath = public_path('/imagePlats/');
            $uploadedImage->move($destinationPath, $imageName);
            $uploadedImage->imagePath = $destinationPath . $imageName;
        }
        $plat->image = $imageName;
        $plat->save();

        return $this->index();
    }

    public function show(Plats $plats)
    {
        $plats::all();
        // return view('welcome', compact('plats'));
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
