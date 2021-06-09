<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 'plat_id', 'restaurant_id', 'livreur_id',
    ];

    public function user()
    {
         return $this->belongsTo('App\Models\User');
    }

    public function Livreur()
    {
         return $this->belongsTo('App\Models\Livreur');
    }

    public function plat()
    {
         return $this->belongsTo('App\Models\Plats');
    }

}
