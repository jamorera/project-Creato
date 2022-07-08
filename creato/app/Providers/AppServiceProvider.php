<?php

namespace App\Providers;

use App\Service\CostadoFactory\Costado;
use Illuminate\Support\ServiceProvider;
use App\Service\BaseFactory\MargenAncho;
use App\Interface\Base\DisenoBaseInterface;
use App\Service\BaseFactory\MargenCompleto;
use App\Interface\Costado\DisenoCostadoInterface;
use App\Service\CostadoAnchoFactory\CostadoCompleto;

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
        $this->app->bind(DisenoCostadoInterface::class, function ($app) {
            return $app->make(request()->pestana === false ?  Costado::class : CostadoCompleto::class);
        });
        // $this->app->bind(DisenoCostadoInterface::class, function ($app) {
        //     return $app->make(request()->pestana === false ?  Costado::class : CostadoCompleto::class);
        // });
    }
    public function boot()
    {
        //
    }
}
