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
        'flex w-full p-4 auth-theme-switcher',
        'justify-start' => str_contains($alignment, 'left'),
        'justify-end' => str_contains($alignment, 'right'),
        'justify-center' => str_contains($alignment, 'center'),
    ])>
        <div class="rounded-lg bg-white p-1 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10" data-focus="light-switch">
            <div
                x-data="{
                    theme: null,

                    init: function () {
                        this.theme = localStorage.getItem('theme') || @js(filament()->getDefaultThemeMode()->value)

                        $dispatch('theme-changed', theme)

                        $watch('theme', (theme) => {
                            $dispatch('theme-changed', theme)
                        })
                    },
                }"
                class="fi-theme-switcher grid grid-flow-col gap-x-1"
            >
                <x-light-switch::button
                    icon="heroicon-m-sun"
                    theme="light"
                />

                <x-light-switch::button
                    icon="heroicon-m-moon"
                    theme="dark"
                />

                <x-light-switch::button
                    icon="heroicon-m-computer-desktop"
                    theme="system"
                />
            </div>
        </div>
    </div>
@endif

