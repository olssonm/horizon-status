<?php

namespace Olssonm\HorizonStatus;

use Illuminate\Support\ServiceProvider;
use Laravel\Horizon\Contracts\MasterSupervisorRepository;

class HorizonStatusServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind('horizon-status', function ($app) {
            return new HorizonStatus(resolve(MasterSupervisorRepository::class));
        });
    }
}
