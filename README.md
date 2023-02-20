[![Latest Version on Packagist](https://img.shields.io/packagist/v/olssonm/horizon-status.svg?style=flat-square)](https://packagist.org/packages/olssonm/horizon-status)
[![Build Status](https://img.shields.io/github/actions/workflow/status/olssonm/horizon-status/test.yml?style=flat-square&label=tests)](https://github.com/olssonm/horizon-status/actions?query=workflow%3A%22Run+tests%22)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

# Laravel Horizon status checker

Simple utility to check the current status of your Laravel Horizon instance programatically. 

## Why?

Why use this package if the Artisan command `horizon:status` is available? Because there are times that the need to check the status programatically emerge. For example, if you via scheduling want to make sure that your Horizon-instance is running and you don't want to parse strings or the like:

``` php
// app/Console/Commands/HorizonIsRunning.php
use Olssonm\HorizonStatus\Facade\HorizonStatus;

public function __handle() {
    if(!HorizonStatus::isActive()) {
        // Notify admin (not via the Horizon-queue of course...)
    }
}

// app/Console/Kernel.php
protected function schedule(Schedule $schedule) {
    $schedule->command('horizon:is-running')->everyFiveMinutes();
}
```

Or perhaps you want to have a status-icon clearly visible directly in your blade-template:

``` html
@if(HorizonStatus::isActive())
    <div class="success">Horizon is running</div>
@else
    <div class="warning">Horizon is down</div>
@endif
```

## Installation

```
composer require olssonm/horizon-status
```

**Note** – This package requires Laravel Horizon running on either Laravel 8 or 9.

## Usage

There are four methods available with this package.

**status**

Returns one of the three available statuses, `active`, `inactive` or `paused`.

``` php
use Olssonm\HorizonStatus\Facade\HorizonStatus;

HorizonStatus::status();
// active
```

**isActive**

Return `true` or `false` whether status is `active`:

``` php
use Olssonm\HorizonStatus\Facade\HorizonStatus;

HorizonStatus::isActive();
// true
```

**isInactive**

Return `true` or `false` whether status is `inactive`:

``` php
use Olssonm\HorizonStatus\Facade\HorizonStatus;

HorizonStatus::isInactive();
// false
```

**isPaused**

Return `true` or `false` whether status is `paused`:

``` php
use Olssonm\HorizonStatus\Facade\HorizonStatus;

HorizonStatus::isPaused();
// false
```

## License

The MIT License (MIT). Please see the [LICENSE.md](LICENSE.md) for more information.

© 2022 [Marcus Olsson](https://marcusolsson.me).
