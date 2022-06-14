<?php

namespace Olssonm\HorizonStatus;

use Laravel\Horizon\Contracts\MasterSupervisorRepository;

class HorizonStatus
{
    protected string $status;

    public function __construct(MasterSupervisorRepository $masterSupervisorRepository)
    {
        $masters = $masterSupervisorRepository->all();

        if (!$masters) {
            $this->status = 'inactive';
        } else {
            $this->status = collect($masters)->contains(function ($master) {
                return $master->status === 'paused';
            }) ? 'paused' : 'active';
        }
    }

    public function status(): string
    {
        return $this->status;
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function isPaused(): bool
    {
        return $this->status === 'paused';
    }

    public function isInactive(): bool
    {
        return $this->status === 'inactive';
    }
}
