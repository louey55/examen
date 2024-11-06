<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
 /*   public function boot(): void
    {
        //
    }*/
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
                $this->mapCustomApiRoutes();
    }
    
    protected function mapCustomApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
    
    public function boot()
    {

        $this->loadRoutesFrom(base_path('routes/api.php'));
    }

}
