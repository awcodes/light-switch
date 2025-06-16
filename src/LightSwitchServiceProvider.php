<?php

declare(strict_types=1);

namespace Awcodes\LightSwitch;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LightSwitchServiceProvider extends PackageServiceProvider
{
    public static string $name = 'light-switch';

    public static string $viewNamespace = 'light-switch';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasViews();
    }
}
