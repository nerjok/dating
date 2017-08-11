<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

    view()->composer('layouts.app', function($view){

          $view->with('tags', \App\Tag::has('articles')->pluck('name'));
        });
        
        

    Validator::extend('numericarray', function($attribute, $value, $parameters)
    {
          if(! is_array($value)) {
        return false;
    }

    foreach($value as $v) {
        if(! is_numeric($v)) {
            return false;
        }



    }

    return true;
    });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
