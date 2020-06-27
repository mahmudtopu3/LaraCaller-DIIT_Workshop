<?php 

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class BindServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'App\Repositories\TestInterface',
            'App\Repositories\TestRepository1'
        );

        $this->app->bind(
            'App\Repositories\TestInterface',
            'App\Repositories\TestRepository2'
        );
    }
}