@php
    $plugin = filament('awcodes/light-switch');
    $alignment = $plugin->getPosition()->value;
@endphp

@if (
    filament()->hasDarkMode() &&
    (! filament()->hasDarkModeForced()) &&
    $plugin->shouldShowSwitcher()
)
    <div @class([
        'auth-theme-switcher fixed w-full flex p-4 z-50',
        'top-0' => str_contains($alignment, 'top'),
        'bottom-0' => str_contains($alignment, 'bottom'),
        'justify-start' => str_contains($alignment, 'left'),
        'justify-end' => str_contains($alignment, 'right'),
        'justify-center' => str_contains($alignment, 'center'),

    ])>
        <div class="rounded-lg bg-gray-50 dark:bg-gray-950">
            <x-filament-panels::theme-switcher />
        </div>
    </div>
@endif

