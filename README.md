# Light Switch 

Plugin to add theme switching (light/dark/system) to the auth pages for Filament Panels

[![Latest Version on Packagist](https://img.shields.io/packagist/v/awcodes/light-switch.svg?style=flat-square)](https://packagist.org/packages/awcodes/light-switch)
[![Total Downloads](https://img.shields.io/packagist/dt/awcodes/light-switch.svg?style=flat-square)](https://packagist.org/packages/awcodes/light-switch)

![light switch screenshots](https://res.cloudinary.com/aw-codes/image/upload/w_1200,f_auto,q_auto/plugins/light-switch/awcodes-light-switch.jpg)

## Requirements

* Filament v3

## Installation

You can install the package via composer:

```bash
composer require awcodes/light-switch
```

## Usage

```php
use Awcodes\LightSwitch\LightSwitchPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            LightSwitchPlugin::make(),
        ]);
}
```

### Position

By default, the switcher will be added to the top right of the auth pages. You can change this by passing one of the `Alignment` enums cases to the `position()` method.

```php
use Awcodes\LightSwitch\LightSwitchPlugin;
use Awcodes\LightSwitch\Enums\Alignment;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            LightSwitchPlugin::make()
                ->position(Alignment::BottomCenter),
        ]);
}

// Available positions
Alignment::TopLeft
Alignment::TopCenter
Alignment::TopRight
Alignment::BottomLeft
Alignment::BottomCenter
Alignment::BottomRight
```

### Disabling on specific pages

You can disable the switcher on specific pages by passing an array of route strings to the `on()` method. Anything in this array will get evaluated as should be shown. Otherwise, it will be enabled on all auth pages available to your panel.

When determining if the switcher should be shown the `Str::contains()` method is used to match the route name, so you can pass a partial route string to match multiple pages and not have to pass the complete route name. This is useful if you need to target routes containing a specific panel route, like `admin.auth.email` or `app.auth.email`.

```php
use Awcodes\LightSwitch\LightSwitchPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            LightSwitchPlugin::make()
                ->enabledOn([
                    'auth.email',
                    'auth.login',
                    'auth.password',
                    'auth.profile',
                    'auth.register',
                ]),
        ]);
}
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Adam Weston](https://github.com/awcodes)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
