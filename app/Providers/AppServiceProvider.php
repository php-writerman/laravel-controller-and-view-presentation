<?php

namespace App\Providers;

use Collective\Html\FormFacade as Form;
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
        Form::component('textGroup', 'components.text', ['name', 'value'=> null, 'attributes']);
        Form::component('emailGroup', 'components.email', ['name', 'value', 'attributes']);
        Form::component('textareaGroup', 'components.textarea', ['name', 'value', 'attributes']);
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

