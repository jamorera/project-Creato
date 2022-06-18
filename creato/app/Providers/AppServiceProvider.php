<?php

namespace App\Providers;

use App\Service\Base\BaseService;
use App\Service\Base\TipoBaseService;
use App\Interface\BaseMaderaInterface;
use Illuminate\Support\ServiceProvider;
use App\Service\Base\BasePestanaService;
use App\Service\BaseFactory\MargenAncho;
use App\Service\BaseFactory\MargenCompleto;
use App\Interface\Base\DisenoInterfaceBase;
use App\Service\BaseFactory\BloqueRepisa;
use App\Service\BaseFactory\Taco;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DisenoInterfaceBase::class, function ($app) {
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
