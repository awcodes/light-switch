# Light Switch 

Plugin to add theme switching (light/dark/system) to the auth pages for Filament Panels

[![Latest Version](https://img.shields.io/github/release/awcodes/light-switch.svg?style=flat-square&color=blue&label=Release)](https://github.com/awcodes/light-switch/releases)
[![MIT Licensed](https://img.shields.io/badge/License-MIT-blue.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/awcodes/light-switch.svg?style=flat-square&color=blue&label=Downloads)](https://packagist.org/packages/awcodes/light-switch)
[![GitHub Repo stars](https://img.shields.io/github/stars/awcodes/light-switch?style=flat-square&color=blue&label=Stars)](https://github.com/awcodes/light-switch/stargazers)

## Compatibility

| Package Version | Filament Version |
|-----------------|------------------|
| 1.x             | 3.x              |
| 2.x             | 4.x              |
| 3.x             | 5.x              |

<!-- [docs_start] -->

## Installation

You can install the package via composer:

```bash
composer require awcodes/light-switch
```

> [!IMPORTANT]
> If you have not set up a custom theme and are using Filament Panels follow the instructions in the [Filament Docs](https://filamentphp.com/docs/4.x/styling/overview#creating-a-custom-theme) first.

After setting up a custom theme add the plugin's views to your theme css file or your app's css file if using the standalone packages.

```css
@source '../../../../vendor/awcodes/light-switch/resources/**/*.blade.php';
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

<!-- [docs_end] -->

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
