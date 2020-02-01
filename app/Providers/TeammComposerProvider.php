<?php

namespace App\Providers;

use App\Http\view\Composers\TeammComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TeammComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('backend.Partials.teamms.*', TeammComposer::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
