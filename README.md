# Jetstream User Timezone

This package adds a simple way for you to add a user timezone selection field to your user profile page in jetstream.

- Validation included

![image](https://user-images.githubusercontent.com/43909932/189502298-5094b22a-0b56-4767-85e4-74c15798a7ed.png)


`Note: Livewire is currently the only supported stack`

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

Finally add the following to your `User` model:

```php
use RhysLees\JetstreamUserTimezone\Traits\HasTimezone;

class User extends Authenticatable
{
    use HasTimezone;
    ...
}
```

## What timezones are shown?
Under the hood, we use php's default `timezone_identifiers_list()` function to return all avalible timezones to the user.
If you would like to specify what timezone to use, you can fill the array with your choice of options in `config/jetstream-user-timezone.php` in the timezones array.

`Note: you must ensure you add valid timezones to the array or validation will fail for users.`

For a list of valid timezones please see: [https://www.php.net/manual/en/timezones.php](https://www.php.net/manual/en/timezones.php)

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
