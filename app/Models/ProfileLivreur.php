<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileLivreur extends Model
{
    use HasFactory;
    protected $fillable =[
        'nom', 'prenom', 'adresse', 'CNI', 'telephone', 'transport', 'user_id',
    ];

    public function user()
    {
       return $this->belongsTo('App\Models\User', 'user_id');
    }

}
