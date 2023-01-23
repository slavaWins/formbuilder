<?php

namespace SlavaWins\Formbuilder\Providers;

use Illuminate\Support\ServiceProvider;

class FormbuilderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //$loader = \Illuminate\Foundation\AliasLoader::getInstance();
       // $loader->alias("FElement");
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'formbuilder');

        $this->publishes([
            __DIR__.'/../resources/js' => public_path('js/formbuilder'),
        ], 'public');



    }
}
