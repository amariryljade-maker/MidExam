<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Stores the default settings for the ContentSecurityPolicy, if you
 * choose to use it. The values here will be read in and set as defaults
 * for the site. If needed, they can be overridden on a page-by-page basis.
 *
 * Suggested reference for explanations:
 *
 * @see https://www.html5rocks.com/en/tutorials/security/content-security-policy/
 */
class ContentSecurityPolicy extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Broadbrush CSP management
     * --------------------------------------------------------------------------
     */

    /**
     * Default CSP report context
     *
     * @var bool
     */
    public $reportOnly = false;

    /**
     * Specifies a URL where a browser will send reports when a content security policy is violated.
     *
     * @var string|null
     */
    public $reportURI;

    /**
     * Instructs user agents to rewrite URL schemes, changing HTTP to HTTPS. This directive is for websites with
     * large numbers of old URLs that need to be rewritten.
     *
     * @var bool
     */
    public $upgradeInsecureRequests = false;

    /**
     * --------------------------------------------------------------------------
     * Sources allowed
     * --------------------------------------------------------------------------
     * Each of the following holds an array of allowed sources for the indicated
     * type of data. For instance, if you want to allow images to be loaded from
     * your own domain as well as from example.com, then you would write:
     *
     *  $images = ['self', 'example.com'];
     *
     * The following types are available:
     *
     *  - baseURI
     *  - childSrc
     *  - connectSrc
     *  - defaultSrc
     *  - fontSrc
     *  - formAction
     *  - frameAncestors
     *  - frameSrc
     *  - imgSrc
     *  - mediaSrc
     *  - objectSrc
     *  - pluginTypes
     *  - reportURI
     *  - sandbox
     *  - scriptSrc
     *  - styleSrc
     */

    /**
     * Default source
     *
     * @var array<string>|string|null
     */
    public $defaultSrc;

    /**
     * Script source
     *
     * @var array<string>|string|null
     */
    public $scriptSrc;

    /**
     * Style source
     *
     * @var array<string>|string|null
     */
    public $styleSrc;

    /**
     * Image source
     *
     * @var array<string>|string|null
     */
    public $imgSrc;

    /**
     * Base URI
     *
     * @var array<string>|string|null
     */
    public $baseURI;

    /**
     * Child source
     *
     * @var array<string>|string|null
     */
    public $childSrc;

    /**
     * Connect source
     *
     * @var array<string>|string|null
     */
    public $connectSrc;

    /**
     * Font source
     *
     * @var array<string>|string|null
     */
    public $fontSrc;

    /**
     * Form action
     *
     * @var array<string>|string|null
     */
    public $formAction;

    /**
     * Frame ancestors
     *
     * @var array<string>|string|null
     */
    public $frameAncestors;

    /**
     * Frame source
     *
     * @var array<string>|string|null
     */
    public $frameSrc;

    /**
     * Media source
     *
     * @var array<string>|string|null
     */
    public $mediaSrc;

    /**
     * Object source
     *
     * @var array<string>|string|null
     */
    public $objectSrc;

    /**
     * Plugin types
     *
     * @var array<string>|string|null
     */
    public $pluginTypes;

    /**
     * Manifest source
     *
     * @var array<string>|string|null
     */
    public $manifestSrc;

    /**
     * Sandbox
     *
     * @var array<string>|string|null
     */
    public $sandbox;
}

