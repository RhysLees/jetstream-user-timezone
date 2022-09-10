<?php

namespace RhysLees\JetstreamUserTimezone;

use Livewire\Livewire;
use RhysLees\JetstreamUserTimezone\Actions\UpdateUserTimezone;
use RhysLees\JetstreamUserTimezone\Contracts\UpdatesUserTimezone;
use RhysLees\JetstreamUserTimezone\Http\Livewire\Profile\UpdateTimezoneForm;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasMigration('add_timezone_field_to_users_table.php');
    }

    public function boot()
    {
        parent::boot();

        if (! $this->app->runningInConsole()) {
            Livewire::component('jetstream-user-timezone::update-timezone-form', UpdateTimezoneForm::class);
        }
    }

    public function register()
    {
        parent::register();

        $this->app->bind(
            UpdatesUserTimezone::class,
            UpdateUserTimezone::class
        );
    }
}
