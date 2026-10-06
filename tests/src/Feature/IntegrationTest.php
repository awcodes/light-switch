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

it('displays above the page for top positions', function () {
    $this->panel
        ->plugins([
            LightSwitchPlugin::make()
                ->position(Alignment::TopRight),
        ]);

    $this->get('/admin/login')
        ->assertOk()
        ->assertSeeInOrder(['auth-theme-switcher justify-end', 'id="fi-main-content"'], escape: false);
});

it('displays below the page for bottom positions', function () {
    $this->panel
        ->plugins([
            LightSwitchPlugin::make()
                ->position(Alignment::BottomLeft),
        ]);

    $this->get('/admin/login')
        ->assertOk()
        ->assertSeeInOrder(['id="fi-main-content"', 'auth-theme-switcher justify-start'], escape: false);
});

it('renders the switcher once', function (Alignment $position) {
    $this->panel
        ->plugins([
            LightSwitchPlugin::make()
                ->position($position),
        ]);

    expect(substr_count($this->get('/admin/login')->getContent(), 'auth-theme-switcher'))->toBe(1);
})->with([Alignment::TopCenter, Alignment::BottomCenter]);
