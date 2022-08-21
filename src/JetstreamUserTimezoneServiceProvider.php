<?php

namespace RhysLees\JetstreamUserTimezone;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use RhysLees\JetstreamUserTimezone\Commands\JetstreamUserTimezoneCommand;

class JetstreamUserTimezoneServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('jetstream-user-timezone')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_jetstream-user-timezone_table')
            ->hasCommand(JetstreamUserTimezoneCommand::class);
    }
}
