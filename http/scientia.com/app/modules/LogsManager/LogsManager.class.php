<?php
/**
 * Class LogsManager
 * 
 * This class manage log files.
 */

class LogsManager {
    /**
     * Contains the path directory
     * 
     * @var string
     *  PATH_LOG by default.
     */
    private static $_path = PATH_LOG;
    
    /**
     * Max lines by logs.
     * 
     * @var int
     *  False or zero means infinite lines (by default).
     */
    private static $_numberOfLines = FALSE;
    
    /**
     * Activate instance.
     * 
     * @var boolean
     *  FALSE by default.
     */
    private static $_instance = FALSE;
    
    //--- Singleton
    /**
     * Disallow the access to the constructor.
     */
    private function __construct($pPath = NULL) {
        if(!is_null($pPath)) {
            self::$_path = $pPath;
        }
    }
    
    /**
     * Allow only one instance of this class.
     * 
     * @return LogsManager 
     *  Return a single instance of the object.
     */
    static public function instance($pPath) {
        if(self::$_instance === FALSE) {
            return self::$_instance = new LogsManager($pPath);
        }
        
        return self::$_instance;
    } 
    //--- /Singleton
    
    /**
     * Determinate the error level to know in which log it have to be written.
     * 
     * @param $pErrNo
     *  The error number.
     * 
     * @return string
     *  Return the name of the log file where the information have to go.
     */
    public function errorFileName($pErrNo) {
        switch ($pErrNo) {
            case E_ERROR:
                return 'errors.log';
                break;
                
            case E_WARNING:
                return 'warnings.log';
                break;
                
            case E_PARSE:
                return 'errors.log';
                break;
                
            case E_NOTICE:
                return 'notice.log';
                break;
                
            case E_COMPILE_ERROR:
                return 'zend_errors.log';
                break;
                
            case E_COMPILE_WARNING:
                return 'zend_warnings.log';
                break;
                
            case E_USER_ERROR:
                return 'errors.log';
                break;
                
            case E_USER_WARNING:
                return 'warnings.log';
                break;
                
            case E_USER_NOTICE:
                return 'notice.log';
                break;
            
            default:
                return $pErrNo;
                break;
        }
    }
    
    public function write($pErrNo, $pErr) {
        $msg = '';
        if(self::$_numberOfLines === False) {
            FileManager::insertOnBottom(
                PATH_LOG . $this->errorFileName($pErrNo),
                $msg
            );
        } else {
            FileManager::insertOnBottomLimitedByNumber(
                PATH_LOG . $this->errorFileName($pErrNo),
                self::$_numberOfLines,
                $msg);
        }
    }
    
    public function read($pLogType) {
        
    }
}
