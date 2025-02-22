<?php

return [
    'models' => [
        // 'Product' => 'App\\Models\\Product',
    ],
    'api_enabled' => true,
    'cache' => [
        'enabled' => true,
        'key' => 'filament-menu-builder',
        'ttl' => 60 * 60 * 24,
    ],
    'usable_parameters' => [
        // For example:
        // 'mega_menu',
        // 'mega_menu_columns',
    ],
    'exclude_route_names' => [
        '/^debugbar\./',
        '/^filament\./',
        '/^livewire\./',
        '/^horizon\./',
        '/^storage\.local$/',
        '/^notices\.show$/',
        '/^blog\.details$/',
        '/^event\.details$/',

    ],

    'exclude_routes' => [
        //
    ],
    'dto' => [
        'menu' => \Biostate\FilamentMenuBuilder\DTO\Menu::class,
        'menu_item' => \Biostate\FilamentMenuBuilder\DTO\MenuItem::class,
    ],
];
