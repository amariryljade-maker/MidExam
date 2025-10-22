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

    /**
     * --------------------------------------------------------------------------
     * Max Depth
     * --------------------------------------------------------------------------
     *
     * The maximum depth Kint will traverse into nested variables.
     *
     * @var int
     */
    public $maxDepth = 6;

    /**
     * --------------------------------------------------------------------------
     * Display Called From
     * --------------------------------------------------------------------------
     *
     * Whether to display where Kint was called from.
     *
     * @var bool
     */
    public $displayCalledFrom = true;

    /**
     * --------------------------------------------------------------------------
     * Expanded
     * --------------------------------------------------------------------------
     *
     * Whether Kint's output should be expanded by default.
     *
     * @var bool
     */
    public $expanded = false;

    /**
     * --------------------------------------------------------------------------
     * Rich Theme
     * --------------------------------------------------------------------------
     *
     * The theme to use for Kint's rich renderer.
     *
     * @var string
     */
    public $richTheme = 'aante-light.css';

    /**
     * --------------------------------------------------------------------------
     * Rich Folder
     * --------------------------------------------------------------------------
     *
     * Whether to show the folder icon in rich mode.
     *
     * @var bool
     */
    public $richFolder = false;

    /**
     * --------------------------------------------------------------------------
     * Rich Sort
     * --------------------------------------------------------------------------
     *
     * Sort mode for rich renderer.
     *
     * @var int
     */
    public $richSort = 0;

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

