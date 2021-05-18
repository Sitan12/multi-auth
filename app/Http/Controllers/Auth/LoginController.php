<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    use AuthenticatesUsers;

    
 public function login(Request $request){
  $input = $request->all();
  $this->validate($request,[
    'email' =>'required|email',
    'password' => 'required',
  ]);

  if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
  {
    if (auth()->user()->is_admin == 1){
      return view('isadmins.index');
    }else {
      $role = Auth::user()->role; 
        switch ($role) {
          case 'resto':
            return view('restos.index') ;
            break;
          case 'client':
            return view('clients.index');
            break;
            case 'livreur':
              return view('livreurs.index');
              break; 
          default:
            return '/home'; 
          break;
        }
    }
  } 
}
  
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}


