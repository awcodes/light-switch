---
title: Installation
description: Install the package, register the plugin on a panel, and add the plugin's views to your theme's CSS.
---

# Installation

## Requirements

- PHP 8.2 or higher
- Filament 4.x or 5.x
- A custom Filament theme

Earlier releases support earlier versions of Filament:

| Package Version | Filament Version |
| --- | --- |
| 1.x | 3.x |
| 2.x | 4.x |
| 3.x | 4.x & 5.x |

## Install the package

```bash
composer require awcodes/light-switch
```

## Set up a custom theme

> [!IMPORTANT]
> This package needs a custom theme. If your panel is still using Filament's compiled default, follow [Creating a custom theme](https://filamentphp.com/docs/4.x/styling/overview#creating-a-custom-theme) before continuing.

The switcher's markup is built from Tailwind utility classes. Without a custom theme there is no Tailwind build of your own for those classes to be compiled into, so the control renders unstyled.

## Register the plugin's views with Tailwind

Add the package's views to your theme's CSS file — or your application's CSS file if you are using the standalone Filament packages:

```css
@source '../../../../vendor/awcodes/light-switch/resources/**/*.blade.php';
```

Tailwind only generates classes it can see in source files. Without this line the switcher renders with the right markup and no styling, which is the most common reason it appears broken.

Rebuild your assets afterwards:

```bash
npm run build
```

## Register the plugin

Add the plugin to your panel:

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

That is enough to get the switcher on your login, password reset, and registration pages, positioned in the top right.

To move it or change which pages show it, continue to [Configuration](configuration.md).

## If the switcher does not appear

Check these in order:

1. **Dark mode is enabled on the panel.** The switcher hides itself when the panel has no dark mode, or when a theme mode is forced.
2. **The `@source` line is present** and assets have been rebuilt.
3. **The current route matches.** By default only routes containing `auth.login`, `auth.password`, or `auth.register` show the switcher — see [Configuration](configuration.md).
