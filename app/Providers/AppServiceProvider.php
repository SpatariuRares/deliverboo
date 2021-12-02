<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Braintree\Gateway;

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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class,function($app){
            return new Gateway(
                [
                        "environment"=>"sandbox",
                        "merchantId"=>"ggkpsthsy2pmfyk2",
                        "publicKey"=>"c36dy8kbvswvkckk",
                        "privateKey"=>"982379b23c8bd93288013c530896c814"
                ]      
            );
        });
    }
}
