<?php

namespace Olssonm\HorizonStatus\Facades;

/**
 * @method static string status()
 * @method static bool isActive()
 * @method static bool isInactive()
 * @method static bool isPaused()
 *
 * @see \Olssonm\HorizonStatus\HorizonStatus
 */
class HorizonStatus extends \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'horizon-status';
    }
}
