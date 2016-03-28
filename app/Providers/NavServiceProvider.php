<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Page;

class NavServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('navPages', Page::where('hidden','=','N')->where('page_id','=','0')->where('live','=','Y')->get());
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}