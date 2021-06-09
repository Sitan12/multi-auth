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

      if (auth()->user()->is_admin == 1)
      {
        return view('isadmins.index');
      } else 
      {
        $role = Auth::user()->role; 
          switch ($role) 
          {
            case 'restaurant':
              return redirect('restaurant') ;
              break;
            case 'client':
              return redirect('/');
              break;
              case 'livreur':
                return redirect('livreur'); 
            break;
            default:
            return redirect('home');
             break; 
          }
      }
    } 
    else 
    notify()->error("Email ou Mot de Passe incorrect");
    return redirect('login');
    
  }
  
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}


