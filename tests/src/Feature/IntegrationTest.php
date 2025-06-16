<?php

declare(strict_types=1);

use Awcodes\LightSwitch\Enums\Alignment;
use Awcodes\LightSwitch\LightSwitchPlugin;
use Filament\Facades\Filament;

beforeEach(function () {
    $this->panel = Filament::getCurrentOrDefaultPanel();
});

it('displays the light switch', function () {
    $this->panel
        ->plugins([
            LightSwitchPlugin::make(),
        ]);

    $this->get('/admin/login')
        ->assertOk()
        ->assertSee('auth-theme-switcher');
});

it('hides the light switch', function () {
    $this->panel
        ->plugins([
            LightSwitchPlugin::make()
                ->enabledOn([
                    'auth.email',
                ]),
        ]);

    $this->get('/admin/login')
        ->assertOk()
        ->assertDontSee('auth-theme-switcher');
});

it('displays in correct position', function () {
    $this->panel
        ->plugins([
            LightSwitchPlugin::make()
                ->position(Alignment::BottomLeft),
        ]);

    $this->get('/admin/login')
        ->assertOk()
        ->assertSee('auth-theme-switcher bottom-0 justify-start')
        ->assertDontSee('auth-theme-switcher top-0 justify-end');
});
