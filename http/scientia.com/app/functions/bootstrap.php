<?php
/**
 * Bootstrap file.
 * 
 * That file give some functions to start the application.
 * 
 * @author Yohan Cormier
 * @copyright 2013
 * @version 1.0
 */

 /**
  * Check to prevent to direct access.
  */
if(INDEX_EXEC) {
    /**
     * Returns an "under constrution" page.
     * 
     * @param string $pName
     *  Contain the name of the site.
     * 
     * @param string $pTheme_path
     *  Contain the path for a personalised theme.
     * 
     * @return string
     *  Return a complete under construction html page depending to the
     *  information the function receive or not.
     * 
     * @see basic_loader()
     */
    function under_construction($pName = NULL, $pTheme_path = NULL) {
        if(is_null($pName)) {
            $pName = 'Site under construction.';
            
        } else {
            $pName .= ' coming soon!';
            
            if(is_null($pTheme_path)) {
                
            } else {
                
            }
        }
    }
    
    /**
     * Check if de constant is already defined.
     * 
     * @param string $const
     *  Required, this contain de name of the constant the function 
     *  have to test.
     * 
     * @param mixed $content
     *  Required, if the constante aren't defined, it will be with this content.
     */
    function is_defined($const, $content) {
        if(!defined($const)) {
            define($const, $content);
        }
    }
    
    /**
     * Configure errors setting.
     * 
     * That function configure the error_reporting, set_error_handler and the 
     * errors settings in general.
     */
    function error_config() {
        if(ERR_LEVEL !== DEVELOPMENT) {
            ini_set('display_errors', 1);
        } else {
            ini_set('display_errors', 0);
        }
        
        $errorsManager = ErrorsManager::instance();
        
        if(ERR_LEVEL !== PRODUCTION) {
            ErrorsManager::setVerboseMode(TRUE);
        }
        
        error_reporting(ERR_LEVEL);
        $errorsManager->setLogsPath(PATH_LOG);
        set_error_handler(array($errorsManager, 'captureErrors'));
        set_exception_handler(array($errorsManager, 'captureExceptions'));
        register_shutdown_function(array($errorsManager, 'captureShutdown'));
        //ini_set('log_errors', TRUE);
        //ini_set('error_log', DEFAULT_LOG_FILE);
    }
    
    /**
     * the basic loader function.
     * 
     * Check if the basic configuration of the administrator is set, or else, 
     * it will check if the constant UNDER_CONSTRUCTION is set to TRUE or not
     * to know if it has to send a specific under construction page.
     * 
     * After checking the basics, the basic loader will load the Autoloader to
     * allow classes to load by themselves.
     * 
     * With the autoloader the Observer class will check thanks to a config 
     * file at every class calling if it have to be observed or not.
     * 
     * The system errors will be initialised by the Exception class.
     * 
     * The system log will be initialised by the Log class.
     */
    function basic_loader() {
        if (@file_exists(PATH_CONFIG . 'site.conf.php')) {
            require PATH_CONFIG . 'site.conf.php';
            
            if(UNDER_CONSTRUCTION === TRUE) {
                if(UNDER_CONSTRUCTION_THEME !== FALSE) {
                    under_construction(NAME_SITE, UNDER_CONSTRUCTION_THEME);
                } else {
                    under_construction(NAME_SITE);
                }
            }
            
            require_once PATH_CONFIG . 'path.conf.php';
            require_once PATH_APP . 'modules' . DIRECTORY_SEPARATOR . 
                'Autoloader' . DIRECTORY_SEPARATOR . 'Autoloader.class.php';
            
            $autoloader = Autoloader::instance()
                ->addDirectory($absolute_path['app.components'])
                ->addDirectory($absolute_path['app.modules'])
                ->addDirectory($absolute_path['app.plugins']);
            
            spl_autoload_register(array($autoloader, 'autoload'));
            
            error_config();
            
            trigger_error('wtf?', E_USER_WARNING);
            throw new Exception('This is a test.');
            
            //$http_query = new HttpQueryManager();
        } else {
            terminate();
        }
    }
    
    basic_loader();
} else {
    exit('Don\'t try to use direct access !');
}
