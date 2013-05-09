<?php
/**
 * Class ErrorsManager.
 * 
 * This class manage all exceptions and any types of errors and can log it into
 * a log files.
 */

class ErrorsManager {
    const OUTPUT_LOG = 0x01;
    const OUTPUT_MAIL = 0x02;
    
    /**
     * Contains the path directory of logs.
     * 
     * @var string
     *  NULL by default.
     */
    private static $_logPath = NULL;
    
    /**
     * Define the verbose mode.
     * 
     * @var boolean
     *  FALSE by default.
     */
    private static $_verbose = FALSE;
    
    /**
     * Contains the mail addresses of administrators.
     * 
     * @var array
     *  Array empty by default.
     */
    private static $_mails = array();
    
    /**
     * Contains the outpout configuration.
     * 
     * This property contains constant(es) of configuration.
     * ex: self::$_output = OUTPUT_LOG | OUTPUT_MAIL;
     * That means it will save the output into log file and send by mail.
     * 
     * @var int
     *  NULL by default.
     */
    private static $_output = NULL;
    
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
    private function __construct() {}
    
    /**
     * Allow only one instance of this class.
     * 
     * @return ErrorsManager 
     *  Return a single instance of the object.
     */
    static public function instance() {
        if(self::$_instance === FALSE) {
            self::$_instance = new ErrorsManager();
        }
        
        return self::$_instance;
    }
    //--- /Singleton
    
    /**
     * This main function send errors to the output function in array form.
     * 
     * @param int $pErrNo
     *  Number of error.
     * 
     * @param string $pErrStr
     *  Error Message
     * 
     * @param 
     */
    public function captureErrors($pErrNo, $pErrStr, $pErrFile, $pErrLine, $pErrContext) {
        $this->_sendToOuput('captureErrors', array(
            'ErrNo' => $pErrNo,
            'ErrStr' => $pErrStr,
            'ErrFile' => $pErrFile,
            'ErrLine' => $pErrLine,
            'ErrContext' => $pErrContext,
            ));
    }
    
    /**
     * This main function send exceptions to the output function in array form.
     */
    public function captureExceptions($pException) {
        $this->_sendToOuput('captureExceptions', $pException);
    }
    
    /**
     * 
     */
    public function captureShutdown() {
        
    }
    
    /**
     * Set the path to the log.
     * 
     * @return boolean
     *  Return TRUE if the path exists and save it.
     *  Return FALSE if the path doesn't exists.
     */
    static public function setLogsPath($pPath) {
        if(is_string($pPath) && is_dir($pPath)) {
            self::$_logPath = $pPath;
            self::$_output = self::$_output | self::OUTPUT_LOG;
            
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /**
     * Send the log path.
     * 
     * @return mixed
     *  Return the path to the log if is set, return FALSE if not.
     */
    static public function getLogPath() {
        if(is_string(self::$_logPath) && !(is_null(self::$_logPath))) {
            return self::$_logPath;
        } else {
            return FALSE;
        }
    }
    
    /**
     * Set the verbose mode.
     */
    static public function setVerboseMode($pBool) {
        $pBool = (bool) $pBool;
        
        self::$_verbose = $pBool;
    }
    
    /**
     * Get the verbose mode.
     * 
     * @return boolean
     *  Return TRUE if the verbose mode is activate else FALSE if not.
     */
    static public function getVerboseMode() {
        return self::$_verbose;
    }
    
    /**
     * Set the output mode.
     * 
     * Allow to send by mail, receive an error screen and/or save it into a log
     * file.
     * 
     * @return boolean
     *  TRUE if configuration is set without problems, else FALSE if not. 
     */
    static public function setOutputMode($pParam) {
        if(is_int($pParam)) {
            self::$_output = $pParam;
            
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /**
     * Allow to add mails adresses.
     * 
     */
    static public function setMails($pMail) {
        if(is_array($pMail)) {
            foreach ($pMail as $key => $value) {
                if(filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    if(!in_array($value, self::$_mails)) {
                        self::$_mails[] = $pMail;
                    }
                }
            }
        }
        
        if(filter_var($pMail, FILTER_VALIDATE_EMAIL)) {
            if(!in_array($pMail, self::$_mails)) {
                self::$_mails[] = $pMail;
            }
        }
    }
    
    /**
     * Return mails adresses.
     */
    static public function getMails() {
        if((bool) self::$_mails) {
            return self::$_mails;
        } else {
            return FALSE;
        }
    }
    
    /**
     * 
     */
    private function _errorLevel() {
        
    }
    
    /**
     * 
     */
    private function _saveToLog(array $pErr) {
        LogsManager::instance($this->getLogPath())
            ->write($pErr['ErrNo'], $pErr);
    }
    
    /**
     * 
     */
    private function _showCaptureErrors(array $pErr) {
        $pErr['ErrNo'] = $this->_getErrorLevelName($pErr['ErrNo']);
        
        $context_table = '';
            
        foreach($pErr['ErrContext'] as $key => $value) {
            if(count($value) > 1) {
                $variables = '';
                
                foreach($value as $name => $content) {
                    $variables .= '\'' . $name . '\'';
                    $variables .= ' => ';
                    $variables .= '\'' . $content . '\'';
                    $variables .= '<br />' . PHP_EOL;
                }
            }
            
            $context_table .= '<tr style="background-color: gray;">';
            $context_table .= '<th colspan="3">' . $key . '</th>';
            $context_table .= '</th>';
            $context_table .= '<tr style="display: none;" class="slideToggle"><td colspan="3">';
            $context_table .= $variables;
            $context_table .= '</td></tr>';
        }
        
        require(PATH_APP . 'modules' . 
                DIRECTORY_SEPARATOR . 'ErrorsManager' . 
                DIRECTORY_SEPARATOR . 'view' . 
                DIRECTORY_SEPARATOR . 'debug_infos.php');
    }
    
    /**
     * 
     */
    private function _showCaptureExceptions($pErr) {
        echo '<html><head><title>' . NAME_SITE . '</title></head><body>';
        echo '<table width="100%">';
        echo $pErr->xdebug_message;
        echo '</table></body></html>';
    }
    
    /**
     * 
     */
    private function _sendMail(array $pErr) {
        
    }
    
    /**
     * 
     */
    private function _sendToOuput($pErrType, $pErr = array()) {
        
        if(self::$_output & self::OUTPUT_LOG) {
            $this->_saveToLog(array(
                $pErr['ErrNo'],
                $pErr['ErrStr'],
                $pErr['ErrFile'],
                $pErr['ErrLine'],
                $pErr['ErrContext'],
                ));
        }
        
        if(self::$_output & self::OUTPUT_MAIL) {
            $this->_sendMail(array(
                $pErr['ErrNo'],
                $pErr['ErrStr'],
                $pErr['ErrFile'],
                $pErr['ErrLine'],
                $pErr['ErrContext'],
                ));
        }
        
        if(self::$_verbose) {
            if($pErrType == 'captureErrors') {
                $this->_showCaptureErrors($pErr);
            } else if($pErrType == 'captureExceptions') {
                $this->_showCaptureExceptions($pErr);
            }
        }
    }
    
    /**
     * 
     */
    private function _getErrorLevelName($pErrCode) {
        switch ($pErrCode) {
            case E_ERROR:
                return 'E_ERROR';
                break;
                
            case E_WARNING:
                return 'E_WARNING';
                break;
                
            case E_PARSE:
                return 'E_PARSE';
                break;
                
            case E_NOTICE:
                return 'E_NOTICE';
                break;
                
            case E_CORE_ERROR:
                return 'E_CORE_ERROR';
                break;
                
            case E_CORE_WARNING:
                return 'E_CORE_WARNING';
                break;
                
            case E_COMPILE_ERROR:
                return 'E_COMPILE_ERROR';
                break;
                
            case E_COMPILE_WARNING:
                return 'E_COMPILE_WARNING';
                break;
                
            case E_USER_ERROR:
                return 'E_USER_ERROR';
                break;
                
            case E_USER_WARNING:
                return 'E_USER_WARNING';
                break;
                
            case E_USER_NOTICE:
                return 'E_USER_NOTICE';
                break;
            
            default:
                return $pErrCode;
                break;
        }
    }
}
