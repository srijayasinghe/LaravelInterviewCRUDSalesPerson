<?php

namespace App\Providers;

use App\Service\PeopleService;
use Illuminate\Support\ServiceProvider;

class PeopleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Interfaces\PeopleInterface', function($app){
            return new PeopleService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
