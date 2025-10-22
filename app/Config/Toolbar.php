<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * --------------------------------------------------------------------------
 * Debug Toolbar
 * --------------------------------------------------------------------------
 *
 * The Debug Toolbar provides a way to see information about the performance
 * and state of your application during that page display. By default it will
 * NOT be displayed under production environments, and will only display if
 * CI_DEBUG is true, since if it's not, there's not much to display anyway.
 */
class Toolbar extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Toolbar Views Path
     * --------------------------------------------------------------------------
     *
     * The full path to the the views that are used by the toolbar.
     * This MUST have a trailing slash.
     *
     * @var string
     */
    public $viewsPath = SYSTEMPATH . 'Debug/Toolbar/Views/';

    /**
     * --------------------------------------------------------------------------
     * Toolbar Maximum History
     * --------------------------------------------------------------------------
     *
     * The Toolbar stores its information in files and this setting
     * determines how many history files will be stored.
     *
     * @var int
     */
    public $maxHistory = 20;

    /**
     * --------------------------------------------------------------------------
     * Collect Var Data?
     * --------------------------------------------------------------------------
     *
     * If set to false, the Toolbar will not collect data on the views.
     * To use this, you would also set the same in the Honeypot config file.
     *
     * @var bool
     */
    public $collectVarData = true;

    /**
     * --------------------------------------------------------------------------
     * Max Queries
     * --------------------------------------------------------------------------
     *
     * If the database has more queries than this, then they will be shown
     * in a separate panel in the toolbar for easier viewing.
     *
     * @var int
     */
    public $maxQueries = 100;

    /**
     * --------------------------------------------------------------------------
     * Toolbar Views
     * --------------------------------------------------------------------------
     *
     * The toolbar will be displayed if CI_DEBUG is set to true.
     * This is set in the .env file.
     *
     * @var string[]
     */
    public $collectors = [
        \CodeIgniter\Debug\Toolbar\Collectors\Timers::class,
        \CodeIgniter\Debug\Toolbar\Collectors\Database::class,
        \CodeIgniter\Debug\Toolbar\Collectors\Logs::class,
        \CodeIgniter\Debug\Toolbar\Collectors\Views::class,
        \CodeIgniter\Debug\Toolbar\Collectors\Cache::class,
        \CodeIgniter\Debug\Toolbar\Collectors\Files::class,
        \CodeIgniter\Debug\Toolbar\Collectors\Routes::class,
        \CodeIgniter\Debug\Toolbar\Collectors\Events::class,
    ];

    /**
     * --------------------------------------------------------------------------
     * Collect Var Data from Views?
     * --------------------------------------------------------------------------
     *
     * The Toolbar will by default collect all var data from the views to display.
     * However, this can have a large memory usage and slow down the page load.
     *
     * @var bool
     */
    public $watchedDirectories = [
        APPPATH,
    ];

    /**
     * --------------------------------------------------------------------------
     * Watched Extensions
     * --------------------------------------------------------------------------
     *
     * The extensions to watch when using the toolbar during development.
     *
     * @var string[]
     */
    public $watchedExtensions = [
        'php',
        'css',
        'js',
        'html',
        'svg',
        'json',
        'xml',
    ];
}

