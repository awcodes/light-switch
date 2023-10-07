<?php

namespace Awcodes\LightSwitch;

use Awcodes\LightSwitch\Enums\Alignment;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class LightSwitchPlugin implements Plugin
{
    protected ?Alignment $position = null;

    protected ?array $enabledOn = null;

    public function getId(): string
    {
        return 'awcodes/light-switch';
    }

    public function register(Panel $panel): void
    {
        $panel->renderHook(
            name: 'panels::body.end',
            hook: fn (): View => view('light-switch::switcher')
        );
    }

    public function boot(Panel $panel): void
    {

    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        return filament(app(static::class)->getId());
    }

    public function position(Alignment $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function enabledOn(array $routes): static
    {
        $this->enabledOn = $routes;

        return $this;
    }

    public function getPosition(): Alignment
    {
        return $this->position ?? Alignment::TopRight;
    }

    public function shouldShowSwitcher(): bool
    {
        return Str::of(request()->route()->getName())->contains($this->enabledOn ?? [
            'auth.login',
            'auth.password',
            'auth.profile',
            'auth.register',
        ]);
    }
}
