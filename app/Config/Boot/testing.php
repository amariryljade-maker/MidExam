<?php

/*
 | --------------------------------------------------------------------------
 | ERROR DISPLAY
 | --------------------------------------------------------------------------
 | In testing, we want to show errors.
 */
error_reporting(-1);
ini_set('display_errors', '1');

/*
 | --------------------------------------------------------------------------
 | DEBUG MODE
 | --------------------------------------------------------------------------
 | Debug mode is an experimental flag that can allow changes throughout
 | the system. This will control whether Kint is loaded, and a few other
 | items. It can always be used within your own application too.
 */
defined('CI_DEBUG') || define('CI_DEBUG', true);

