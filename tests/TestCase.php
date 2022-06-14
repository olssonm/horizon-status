<?php

namespace Olssonm\HorizonStatus\Test;

use Laravel\Horizon\Contracts\MasterSupervisorRepository;
use Laravel\Horizon\HorizonServiceProvider;
use Olssonm\HorizonStatus\HorizonStatusServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            HorizonStatusServiceProvider::class,
            HorizonServiceProvider::class,
        ];
    }
}
