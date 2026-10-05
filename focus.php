<?php

declare(strict_types=1);

use Awcodes\Focus\Card;
use Awcodes\Focus\Enums\Size;
use Awcodes\Focus\Screenshot;
use Awcodes\Focus\ScreenshotSuite;

/*
 * Documentation screenshots for Light Switch, generated with awcodes/focus from the Workbench (run
 * `composer build` first). The switcher only renders on authentication pages, so the suite never signs in.
 * Focus sets Filament's stored theme before the page loads, so the switcher shows the active theme in each capture.
 */

// The awcodes card templates frame each screenshot at 1400x816; the login page is captured at 3/4 of that size
// so the switcher stays legible once the template scales it up.
$cardSlot = [1050, 612];

return ScreenshotSuite::make()
    ->withoutLogin()
    ->screenshots([
        Screenshot::make('login')
            ->viewportSize(1280, 720)
            ->visit('/admin/login')
            ->viewport(),

        Screenshot::make('switcher')
            ->visit('/admin/login')
            ->focus('[data-focus="light-switch"]')
            // The switcher sits 16px from the corner, so wider padding would push the crop off-centre.
            ->padding(16),

        // The Workbench's second panel moves the switcher with position(Alignment::BottomCenter). The registration
        // form is taller than the login form, so the viewport is taller to keep the switcher clear of the card.
        Screenshot::make('position-bottom-center')
            ->viewportSize(1280, 800)
            ->visit('/guest/register')
            ->viewport(),

        // The share-image source. The two-up templates show it dark in slot 1 and light in slot 2, so it is
        // captured in both themes. Slot 1 covers the right of slot 2, so the card uses the bottom-centre panel,
        // where the switcher stays visible in both slots.
        Screenshot::make('card-login')
            ->viewportSize(...$cardSlot)
            ->visit('/guest/login')
            ->viewport(),
    ])
    ->cardTemplates('https://github.com/awcodes/focus-templates/tree/v1.1.0/dist')
    ->cards([
        // Open Graph and the GitHub social preview share one 2400x1260 template; GitHub crops 30px top and bottom.
        Card::make('social')
            ->template('two-up-wide')
            ->title('Light Switch')
            ->screenshots(['card-login', 'card-login'])
            ->sizes([Size::OpenGraph, Size::GitHubSocial]),

        // The Filament plugin directory's 2560x1440 thumbnail.
        Card::make('thumbnail')
            ->template('two-up')
            ->title('Light Switch')
            ->screenshots(['card-login', 'card-login'])
            ->sizes([Size::Filament]),
    ]);
