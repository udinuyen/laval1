<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
        $user = new \App\Models\User; // Khởi tạo object lần đầu

        $this->app->instance('MyUser', $user);

        $this->app->singleton(
            Illuminate\Contracts\Http\Kernel::class,
            App\Http\Kernel::class
        );



        // $this->app->singleton(Interface\Logger::class,ErrorLogger::class);


        // $this->app->when('App\Models\User')
        //   ->needs('$id')
        //   ->give(1);
    // $this->app->bind('namehim', function($app) {
    //     return new \App\Models\User;
    // });

    // $this->app->bind('namehim', function() {
    //      return new \App\Helpers\ExternalApiHelper;
    // });
    // $this->app->bind('MyUser', function($app) {
    //     return new \App\Models\User;
    // });
     }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
