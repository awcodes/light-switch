<?php

declare(strict_types=1);

namespace Awcodes\LightSwitch;

use Awcodes\LightSwitch\Enums\Alignment;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class LightSwitchPlugin implements Plugin
{
    protected ?Alignment $position = null;

    protected ?array $enabledOn = null;

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        return filament(app(static::class)->getId());
    }

    public function getId(): string
    {
        return 'awcodes/light-switch';
    }

    public function register(Panel $panel): void
    {
        // The switcher sits in the simple layout's flow, above or below the page, so a tall form can't scroll under it.
        $panel->renderHook(
            name: PanelsRenderHook::SIMPLE_LAYOUT_START,
            hook: fn (): ?View => $this->getPosition()->isTop() ? view('light-switch::switcher') : null
        );

        $panel->renderHook(
            name: PanelsRenderHook::SIMPLE_LAYOUT_END,
            hook: fn (): ?View => $this->getPosition()->isTop() ? null : view('light-switch::switcher')
        );
    }

    public function boot(Panel $panel): void {}

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

    public function isEnabledOn(): ?array
    {
        return $this->enabledOn;
    }

    public function shouldShowSwitcher(): bool
    {
        return Str::of(request()->route()->getName())->contains($this->isEnabledOn() ?? [
            'auth.login',
            'auth.password',
            'auth.register',
        ]);
    }
}
