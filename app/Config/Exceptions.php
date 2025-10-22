<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Setup how the exception handler works.
 */
class Exceptions extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * LOG EXCEPTIONS?
     * --------------------------------------------------------------------------
     * If true, then exceptions will be logged through Services::Log.
     *
     * @var bool
     */
    public $log = true;

    /**
     * --------------------------------------------------------------------------
     * DO NOT LOG STATUS CODES
     * --------------------------------------------------------------------------
     * Any status codes here will NOT be logged if logging is turned on.
     * By default, only 404 (Page Not Found) exceptions are ignored.
     *
     * @var list<int>
     */
    public $ignoreCodes = [404];

    /**
     * --------------------------------------------------------------------------
     * Error Views Path
     * --------------------------------------------------------------------------
     * This is the path to the directory that contains the 'cli' and 'html'
     * directories that hold the views used to generate errors.
     *
     * @var string
     */
    public $errorViewPath = APPPATH . 'Views/errors';

    /**
     * --------------------------------------------------------------------------
     * HIDE FROM DEBUG TRACE
     * --------------------------------------------------------------------------
     * Any data that you would like to hide from the debug trace.
     * In order to specify 2 levels, use "/" to separate.
     * ex. ['server', 'setup/password', 'secret_token']
     *
     * @var list<string>
     */
    public $sensitiveDataInTrace = [];

    /**
     * --------------------------------------------------------------------------
     * Log Deprecations Instead of Throwing?
     * --------------------------------------------------------------------------
     * By default, CodeIgniter converts deprecations into exceptions. If you
     * would prefer to log them instead, set this to true.
     *
     * @var bool
     */
    public $logDeprecations = false;

    /**
     * --------------------------------------------------------------------------
     * Deprecation Log Level
     * --------------------------------------------------------------------------
     * If $logDeprecations is true, this sets the log level to use for deprecations.
     *
     * @var string
     */
    public $deprecationLogLevel = 'warning';
}

