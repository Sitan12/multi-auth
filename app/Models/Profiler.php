<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiler extends Model
{
    use HasFactory;
    protected $fillable =[
        'adresse', 'telephone', 'categorie', 'reseausocial', 'restaurant_id',
    ];

    public function user()
    {
       return $this->belongsTo('App\Models\User', 'restaurant_id');
    }










}
