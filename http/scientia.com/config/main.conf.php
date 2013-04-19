<?php
/**
 * Main config file.
 * 
 * This file contain the basic informations to run the site.
 */

/**
 * Check to prevent to direct access.
 */
if(INDEX_EXEC){
    /**
     * Global definitions.
     */
    defined('ROOT_SITE') or 
    define('ROOT_SITE', dirname(__DIR__) . DIRECTORY_SEPARATOR);
    
    defined('PATH_PUBLIC') or 
    define('PATH_PUBLIC', ROOT_SITE . 'public' . DIRECTORY_SEPARATOR);
    defined('PATH_MEDIA') or 
    define('PATH_MEDIA', PATH_PUBLIC . 'media' . DIRECTORY_SEPARATOR);
    defined('PATH_HOME') or 
    define('PATH_HOME', ROOT_SITE . 'home' . DIRECTORY_SEPARATOR);
    defined('PATH_VAR') or 
    define('PATH_VAR', ROOT_SITE . 'var' . DIRECTORY_SEPARATOR);
    defined('PATH_TMP') or 
    define('PATH_TMP', ROOT_SITE . 'tmp' . DIRECTORY_SEPARATOR);
    defined('PATH_LIBS') or 
    define('PATH_LIBS', ROOT_SITE . 'libs' . DIRECTORY_SEPARATOR);
    defined('PATH_CONFIG') or 
    define('PATH_CONFIG', __DIR__ . DIRECTORY_SEPARATOR);
    defined('PATH_APP') or 
    define('PATH_APP', ROOT_SITE . 'app' . DIRECTORY_SEPARATOR);
    defined('PATH_LOG') or 
    define('PATH_LOG', PATH_VAR . 'logs' . DIRECTORY_SEPARATOR);
    
    /**
     * Alerts code definitions.
     */
    defined('ALERT') or define('ALERT', 1);
    defined('ERR') or define('ERR', 3);
    defined('WARNING') or define('WARNING', 4);
    defined('NOTICE') or define('NOTICE', 5);
    defined('INFO') or define('INFO', 6);
    defined('DEBUG') or define('DEBUG', 7);
    
    /**
     * Alerts code levels.
     */
    defined('DEVELOPMENT') or define('DEVELOPMENT', -1);
    defined('MAINTENANCE') or define('MAINTENANCE', 
    E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | 
    E_USER_WARNING | E_USER_NOTICE | E_STRICT);
    defined('PRODUCTION') or define('PRODUCTION', 0);
    
    /**
     * Define the error level of the site.
     */
    defined('ERR_LEVEL') or define('ERR_LEVEL', DEVELOPMENT);
    
    /**
     * Define the default log file.
     */
    defined('DEFAULT_LOG_FILE') or 
    define('DEFAULT_LOG_FILE', PATH_LOG . 'default.log');
} else {
    exit('Don\'t try to use direct access !');
}
