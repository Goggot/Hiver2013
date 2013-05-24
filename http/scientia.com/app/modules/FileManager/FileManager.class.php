<?php
/**
 * 
 */

class FileManager {
    /**
     * 
     */
    private static $_path = NULL;
    
    /**
     * 
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
     * @return FileManager 
     *  Return a single instance of the object.
     */
    static public function instance() {
        if(self::$_instance === FALSE) {
            self::$_instance = new FileManager();
        }
        
        return self::$_instance;
    }
    //--- /Singleton
    
    /**
     * 
     */
    public function insertOnBottom($pPath = NULL, $pContent = NULL) {
        if(!file_exists($pPath)) {
            throw new FileManagerException("File not found to " . $pPath);
        }
        if(!is_readable($pPath) and is_writeable($pPath))
    }
    
    public function insertOnBottomLimitedByNumber($pNumber = NULL,
    $pPath = NULL, $pContent = NULL) {
        
    }
}
