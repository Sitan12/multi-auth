<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Notifications;
use App\Models\Plats;
use App\Models\User;
use App\Notifications\CommandNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class CommandeController extends Controller
{
use Notifiable;

    public function __construct()
    {
        $this->users = User::getAllUsers(); 
        $this->middleware('auth');
    }

    public function store(Request $request)
    {  
            $commande = new Commande();

            $commande->user_id = Auth::user()->id;
            $commande->restaurant_id = $request->restaurant_id;
            $commande->plat_id = $request->plat_id;
            $commande->livreur_id = null;
            $commande->save();
            $notification = new Notifications();
            $notification->type = 'commander';
            $notification->sender = $commande->user_id;
            $notification->recipient = $commande->restaurant_id;
            $notification->sending_date = date('Y-m-d');
            $notification->save();

            return redirect('/');
    }

    public function update(Request $request, Commande $commande)
    {
        $commande->livreur_id = $request->livreur_id;
        $commande->save();
        $notification = new Notifications();
        $notification->type = 'livraison';
        $notification->sender = $commande->restaurant_id;
        $notification->recipient = $commande->livreur_id;
        $notification->sending_date = date('Y-m-d');
        $notification->save();
        //  notify()->success("la livraison a bien été attribuée"); 
        // $user = User::where('id' === 'livreur_id',);
        // $commande->user->notify(new CommandNotification($commande));
  
        return redirect('restaurant');
    }
}
