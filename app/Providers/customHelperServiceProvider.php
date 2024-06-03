<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class customHelperServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
       
         require(app_path("Helpers/custom_helpers.php"));
     
    }

    public function boot(): void
    {
        //
    }
}
