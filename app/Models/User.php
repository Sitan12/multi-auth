<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'is_admin',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function profileRestaurant()
    {
        return $this->hasOne('App\Models\ProfileRestaurant');
    }

    public function profileLivreur()
    {
        return $this->hasOne('App\Models\ProfileLivreur');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    public function plat()
    {
        return $this->hasMany('App\Models\Plats');
    }
    public function commande()
    {
        return $this->hasMany('App\Models\Commande');
    }

    public function notification()
    {
        return $this->hasMany('App\Models\Notifications');
    }

    public static function getAllUsers(){
        return User::all();
    }
}
