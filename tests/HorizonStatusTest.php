<?php

use Laravel\Horizon\Contracts\MasterSupervisorRepository;
use Olssonm\HorizonStatus\Facades\HorizonStatus as FacadesHorizonStatus;

beforeEach(function () {
    setHorizonStatus('running');
});

it('can get the status', function () {
    $this->assertEquals('active', FacadesHorizonStatus::status());
});

it('can check if horizon is active', function () {
    $this->assertTrue(FacadesHorizonStatus::isActive());
});

it('can check if horizon is not paused', function () {
    $this->assertFalse(FacadesHorizonStatus::isPaused());
});

it('can check if horizon is inactive', function () {
    $this->assertFalse(FacadesHorizonStatus::isInactive());
});

it('can detect when horizon is paused', function () {
    setHorizonStatus('paused');

    $this->assertEquals('paused', FacadesHorizonStatus::status());
    $this->assertTrue(FacadesHorizonStatus::isPaused());
});

it('can detect when horizon is down', function () {
    setHorizonStatus('inactive');

    $this->assertEquals('inactive', FacadesHorizonStatus::status());
    $this->assertTrue(FacadesHorizonStatus::isInactive());
});

function setHorizonStatus(string $status)
{
    if ($status !== 'inactive') {
        $status = [
            (object) [
                'status' => $status,
            ]
        ];
    } else {
        $status = [];
    }

    $repository = Mockery::mock(MasterSupervisorRepository::class)->makePartial()
        ->shouldReceive('all')
        ->andReturn($status)
        ->getMock();

    app()->instance(MasterSupervisorRepository::class, $repository);
}
