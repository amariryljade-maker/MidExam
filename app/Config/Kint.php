<?php

namespace Config;

use Kint\Parser\ConstructablePluginInterface;
use Kint\Renderer\AbstractRenderer;
use Kint\Renderer\Rich\TabPluginInterface;
use Kint\Renderer\Rich\ValuePluginInterface;

/**
 * --------------------------------------------------------------------------
 * Kint
 * --------------------------------------------------------------------------
 *
 * We use Kint's RichRenderer & ConsoleRenderer which are available after
 * downloading the vendor folder. If we do not have Kint in our vendor
 * folder, we use the dummy class defined in `app/Config/Kint.php` that
 * does nothing.
 *
 * @see https://kint-php.github.io/kint/ for documentation
 */
class Kint
{
    /*
    |--------------------------------------------------------------------------
    | Global Settings
    |--------------------------------------------------------------------------
    */

    /**
     * @var array<string, mixed>
     */
    public $globals = [
        'Kint\\Renderer\\Rich\\' => [
            'theme' => 'aante-light.css',
        ],
    ];

    /*
    |--------------------------------------------------------------------------
    | Application Settings
    |--------------------------------------------------------------------------
    */

    /**
     * @var array<string, mixed>
     */
    public $appSettings = [
        'Kint' => [
            'cli_detection' => false,
        ],
    ];

    /*
    |--------------------------------------------------------------------------
    | Renderer Settings
    |--------------------------------------------------------------------------
    */

    /**
     * @var array<string, array<string, mixed>>
     */
    public $rendererSettings = [];

    /*
    |--------------------------------------------------------------------------
    | Plugins
    |--------------------------------------------------------------------------
    */

    /**
     * @var array<int, array<string, class-string<ConstructablePluginInterface>|false>>
     */
    public $plugins = [];
}

