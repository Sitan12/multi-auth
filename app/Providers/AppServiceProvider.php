<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Notifications;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    
    public function boot()
    {
        // $notifications = Notifications::all();
        // View::share('notify', $notifications);

        View::composer('*', function($view)
        {
            
            if(Auth::user())
            $view->with('notify', Notifications::where('recipient', Auth::user()->id)->get());
            else
            return redirect('login');
        });
        // dd($notify);
    }
    
   
}
