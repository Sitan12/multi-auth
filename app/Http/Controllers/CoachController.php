<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;


class CoachController extends Controller
{
    function register(){
        return view('coachs.registerCoach');
    }

    function create(){
        //
    }
   
}
