---
title: Configuration
description: Move the switcher to any of six positions and control which routes display it.
---

# Configuration

Both settings are chained onto the plugin when you register it.

## Position

By default the switcher sits in the top right. Pass an `Alignment` case to `position()` to move it:

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

`Awcodes\LightSwitch\Enums\Alignment` has six cases:

| Case | Position |
| --- | --- |
| `Alignment::TopLeft` | Top left |
| `Alignment::TopCenter` | Top center |
| `Alignment::TopRight` | Top right — the default |
| `Alignment::BottomLeft` | Bottom left |
| `Alignment::BottomCenter` | Bottom center |
| `Alignment::BottomRight` | Bottom right |

The switcher is positioned fixed against the viewport with a small inset, so it stays in place as the page scrolls.

## Which pages show the switcher

By default the switcher appears on routes whose name contains any of:

```text
auth.login
auth.password
auth.register
```

Pass your own list to `enabledOn()` to replace those defaults entirely:

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

> [!NOTE]
> `enabledOn()` replaces the default list rather than adding to it. If you pass `['auth.email']`, the switcher shows on the email verification page and nowhere else — including the login page. Include every route you want, not just the extra ones.

### How matching works

Route names are matched by substring, not by exact comparison. A route shows the switcher when its name *contains* any string in the list.

This is what makes the values above work across panels. A login route is typically named `filament.admin.auth.login`, so the fragment `auth.login` matches it without you needing to know the panel's ID.

It also means you can be as broad or as narrow as you like:

| Value | Matches |
| --- | --- |
| `auth.` | Every authentication route in every panel |
| `auth.login` | Login routes in every panel |
| `admin.auth.login` | The login route of the `admin` panel only |

Being broad is convenient but blunt — `auth.` will also match any future authentication route Filament adds.

### Verification and profile pages

The default list covers login, password reset, and registration. It does **not** include email verification or profile routes.

If your panel uses those pages and you want the switcher there too, name them explicitly:

```php
LightSwitchPlugin::make()
    ->enabledOn([
        'auth.login',
        'auth.password',
        'auth.register',
        'auth.email',
        'auth.profile',
    ]);
```

## Combining both

The two methods are independent and chain in any order:

```php
use Awcodes\LightSwitch\Enums\Alignment;
use Awcodes\LightSwitch\LightSwitchPlugin;

LightSwitchPlugin::make()
    ->position(Alignment::BottomRight)
    ->enabledOn(['auth.']);
```
