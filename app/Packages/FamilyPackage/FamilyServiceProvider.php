<?php

namespace App\Packages\FamilyPackage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use App\Packages\FamilyPackage\Family;
class FamilyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        App::bind('Family',function (){
            echo 'bind family <br/>';
            return new Family();
        });
    }
}
