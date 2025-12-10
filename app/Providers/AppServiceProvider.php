<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load web routes
        if (file_exists(base_path('routes/web.php'))) {
            require base_path('routes/web.php');
        }

        // Load API routes
        if (file_exists(base_path('routes/api.php'))) {
            Route::prefix('api')   // API routes will have /api prefix
                ->middleware('api')
                ->group(base_path('routes/api.php'));
        }
    }
}

