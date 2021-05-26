<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileRestaurant extends Model
{
    use HasFactory;
    protected $fillable =[
        'adresse', 'telephone', 'categorie', 'reseausocial', 'user_id',
    ];

    public function user()
    {
       return $this->belongsTo('App\Models\User', 'user_id');
    }

}
