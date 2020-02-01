<?php

namespace App\Providers;

use App\Http\view\Composers\TeamComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TeamComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('backend.Partials.teams.*', TeamComposer::class);
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
