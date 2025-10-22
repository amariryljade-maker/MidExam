<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Setup how the exception handler works.
 */
class Logger extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Error Logging Threshold
     * --------------------------------------------------------------------------
     *
     * You can enable error logging by setting a threshold over zero. The
     * threshold determines what gets logged. Any values at or above the
     * threshold will be logged.
     *
     * Threshold options are:
     *
     *  0 = Disables logging, Error logging TURNED OFF
     *  1 = Emergency Messages  - System is unusable
     *  2 = Alert Messages      - Action Must Be Taken Immediately
     *  3 = Critical Messages   - Application component unavailable, unexpected exception.
     *  4 = Runtime Errors      - Don't need immediate action, but should be monitored.
     *  5 = Warnings            - Exceptional occurrences that are not errors.
     *  6 = Notices             - Normal but significant events.
     *  7 = Info                - Interesting events, like user logging in, etc.
     *  8 = Debug               - Detailed debug information.
     *  9 = All Messages
     *
     * You can also pass an array with threshold levels to show individual error types
     *
     *  array(2, 4, 6, 7, 8, 9) = Emergency, Runtime, Notice, Info, Debug, All Messages
     *
     * For a live site you'll usually enable Critical or higher (3) to be logged otherwise
     * your log files will fill up very fast.
     *
     * @var int|list<int>
     */
    public $threshold = (ENVIRONMENT === 'production') ? 4 : 9;

    /**
     * --------------------------------------------------------------------------
     * Date Format for Logs
     * --------------------------------------------------------------------------
     *
     * Each item that is logged has an associated date. You can use PHP date
     * codes to set your own date formatting
     *
     * @var string
     */
    public $dateFormat = 'Y-m-d H:i:s';

    /**
     * --------------------------------------------------------------------------
     * Log Handlers
     * --------------------------------------------------------------------------
     *
     * The logging system supports multiple actions to be taken when something
     * is logged. This is done by allowing for multiple Handlers, special classes
     * designed to write the log to their chosen destinations, whether that is
     * a file on the getServer, a cloud-based service, or even taking actions such
     * as emailing the dev team.
     *
     * Each handler is defined by the class name used for that handler, and it
     * can have a "threshold" value set. The threshold determines what level of
     * error will be logged by that handler, allowing you to have, for example,
     * one error logger that logs everything, while another logs only critical
     * errors.
     *
     * @var array<string, array<string, int|list<string>|string>>
     */
    public $handlers = [
        /*
         * --------------------------------------------------------------------
         * File Handler
         * --------------------------------------------------------------------
         */
        'CodeIgniter\Log\Handlers\FileHandler' => [
            /*
             * The log levels that this handler will handle.
             */
            'handles' => [
                'critical',
                'alert',
                'emergency',
                'debug',
                'error',
                'info',
                'notice',
                'warning',
            ],

            /*
             * The default filename extension for log files.
             * An extension of 'php' allows for protecting the log files via basic
             * scripting, when they are to be stored under a publicly accessible directory.
             *
             * Note: Leaving it blank will default to 'log'.
             */
            'fileExtension' => '',

            /*
             * The file permissions for newly created log files.
             *
             * Note: Leaving it blank will default to 0644.
             */
            'filePermissions' => 0644,

            /*
             * Logging Directory Path
             *
             * By default, logs are written to WRITEPATH . 'logs/'
             * Specify a different destination here, if desired.
             */
            'path' => '',
        ],

        /**
         * --------------------------------------------------------------------
         * ChromeLogger Handler
         * --------------------------------------------------------------------
         * Requires the use of the Chrome web browser and the ChromeLogger extension.
         * Provides inline debugging in your browser's console.
         * DISABLED to prevent initialization issues
         */
        // 'CodeIgniter\Log\Handlers\ChromeLoggerHandler' => [
        //     /*
        //      * The log levels that this handler will handle.
        //      */
        //     'handles' => [
        //         'critical',
        //         'alert',
        //         'emergency',
        //         'debug',
        //         'error',
        //         'info',
        //         'notice',
        //         'warning',
        //     ],
        // ],
    ];
}

