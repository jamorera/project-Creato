<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\BaseFactory\MargenAncho;
use App\Interface\Base\DisenoBaseInterface;
use App\Service\BaseFactory\MargenCompleto;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DisenoBaseInterface::class, function ($app) {
            return $app->make(request()->pestana === false ?  MargenAncho::class : MargenCompleto::class);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
