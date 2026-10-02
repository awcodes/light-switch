# Light Switch

Add a light, dark, and system theme switcher to the authentication pages of a Filament panel.

[![Latest Version](https://img.shields.io/github/release/awcodes/light-switch.svg?style=flat-square&color=blue&label=Release)](https://github.com/awcodes/light-switch/releases)
[![MIT Licensed](https://img.shields.io/badge/License-MIT-blue.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/awcodes/light-switch.svg?style=flat-square&color=blue&label=Downloads)](https://packagist.org/packages/awcodes/light-switch)
[![GitHub Repo stars](https://img.shields.io/github/stars/awcodes/light-switch?style=flat-square&color=blue&label=Stars)](https://github.com/awcodes/light-switch/stargazers)
[![Filament Version](https://img.shields.io/badge/Filament-4.x%20%26%205.x-d97706.svg?style=flat-square)](https://filamentphp.com/docs/5.x/panels/installation)

## Documentation

The full documentation lives at **[docs.aw.codes/light-switch](https://docs.aw.codes/light-switch/3.x)**.

## Compatibility

| Filament version | Package version |
|------------------|-----------------|
| 3.x              | 1.x             |
| 4.x              | 2.x             |
| 4.x & 5.x        | 3.x             |

## Installation

```bash
composer require awcodes/light-switch
```

The plugin needs a custom theme, a Tailwind `@source` line for its views, and registration on your panel. See [Installation](https://docs.aw.codes/light-switch/3.x/installation) for those steps.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

### Development

Install dependencies and run the test suite:

```bash
composer install
composer test
```

Start the Workbench application:

```bash
composer serve
```

Open `/admin` and sign in with `test@example.com` / `password`. The login form is prefilled for convenience.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Adam Weston](https://github.com/awcodes)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
