<?php

declare(strict_types=1);

use Awcodes\LightSwitch\Enums\Alignment;
use Awcodes\LightSwitch\LightSwitchPlugin;
use Filament\Facades\Filament;

beforeEach(function () {
    $this->panel = Filament::getCurrentOrDefaultPanel();
});

it('can register the plugin', function () {
    $this->panel
        ->plugins([
            LightSwitchPlugin::make(),
        ]);

    expect(Filament::getPlugin('awcodes/light-switch'))->toBeInstanceOf(LightSwitchPlugin::class);
});

it('sets correct position', function () {
    $this->panel
        ->plugins([
            LightSwitchPlugin::make()
                ->position(Alignment::BottomCenter),
        ]);

    expect(Filament::getPlugin('awcodes/light-switch')->getPosition())->toBe(Alignment::BottomCenter);
});

it('sets correct visibility', function () {
    $this->panel
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

    expect(Filament::getPlugin('awcodes/light-switch')->isEnabledOn())->toBe([
        'auth.email',
        'auth.login',
        'auth.password',
        'auth.profile',
        'auth.register',
    ]);
});
