# Jetstream User Timezone

## Installation

You can install the package via composer:

```bash
composer require rhyslees/jetstream-user-timezone
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="jetstream-user-timezone-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="jetstream-user-timezone-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="jetstream-user-timezone-views"
```

## Usage


Goto `resources/views/profile/show.blade.php` and and the following between the information form and password form.

```php
@livewire('jetstream-user-timezone::update-timezone-form')

<x-jet-section-border />
```

It should look like this:

```php
...
@if (Laravel\Fortify\Features::canUpdateProfileInformation())
    @livewire('profile.update-profile-information-form')

    <x-jet-section-border />
@endif

@livewire('jetstream-user-timezone::update-timezone-form')

<x-jet-section-border />

@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
    <div class="mt-10 sm:mt-0">
        @livewire('profile.update-password-form')
    </div>

    <x-jet-section-border />
@endif
...
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Rhys Lees](https://github.com/RhysLees)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
