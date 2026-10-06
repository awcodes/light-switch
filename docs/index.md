---
title: Light Switch
description: Add a light, dark, and system theme switcher to the authentication pages of a Filament panel.
---

# Light Switch

Filament's theme switcher lives inside the panel's user menu, which is only reachable once someone has signed in. Light Switch adds one to the authentication pages, so a visitor can change the theme before they log in.

The switcher is a small control with three options — light, dark, and system — that writes the chosen theme to the same storage Filament itself uses. A visitor's choice therefore carries straight through to the panel after they sign in.

![A Filament login page with the Light Switch theme switcher in the top right corner, light theme selected](assets/login-light.png#gh-light-mode-only)
![A Filament login page with the Light Switch theme switcher in the top right corner, dark theme selected](assets/login-dark.png#gh-dark-mode-only)

The active option is highlighted, so the control always shows which theme is in use:

![The theme switcher's light, dark, and system buttons, with light selected](assets/switcher-light.png#gh-light-mode-only)
![The theme switcher's light, dark, and system buttons, with dark selected](assets/switcher-dark.png#gh-dark-mode-only)

## What it does

Registering the plugin adds a render hook to the panel that draws the switcher on the authentication pages. There is nothing to place in a view and no component to call.

Two things are configurable:

- **Where the switcher sits** — any of six corner or edge positions. See [Configuration](configuration.md).
- **Which pages show it** — by default, login, password reset, and registration.

## When the switcher does not appear

The switcher deliberately hides itself in two cases, both inherited from the panel's own settings:

- The panel has dark mode disabled.
- The panel has a theme mode forced, so there is nothing for a visitor to choose.

This means a panel that never offers dark mode will not show a switcher no matter how the plugin is configured, which is usually the right behavior but is worth knowing when the control does not appear.

## Next steps

Start with [Installation](installation.md) — note that this package requires a custom theme, and needs one extra line in your CSS.
