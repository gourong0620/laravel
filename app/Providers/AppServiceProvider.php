<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        /*
        App::bind('family',function (){
            echo 'bind family <br/>';
            return new Family(new Person(new Head()),new Tv());
        });
        */
    }
}
