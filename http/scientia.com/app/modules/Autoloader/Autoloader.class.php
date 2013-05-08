<?php
/**
 * Class Autoloader.
 * 
 * This class controls the autoloading of classes.
 */

/**
 * Exception class of Autoloader class.
 */
class AutoloaderException extends Exception {}

/**
 * This class allows to decorate Iterators and allows to define an extension to 
 * filtered datas.
 */
class ExtensionFilterIteratorDecorator extends FilterIterator {
    private $_ext;
    
    public function accept() {
        if(substr($this->current(), -1 * strlen($this->_ext)) === $this->_ext) {
            return is_readable($this->current());
        }
        
        return FALSE;
    }
    
    public function setExtension($pExt) {
        $this->_ext = $pExt;
    }
}

/**
 * Autoloader class, the main class of this file.
 */
class Autoloader {
    /**
     * Activate instance.
     * 
     * @var boolean
     *  False by default.
     */
    static private $_instance = FALSE;
    
    /**
     * Contain an array of directories path.
     * 
     * @var array
     */
    private $_directories = array();
    
    /**
     * Contain an array of classes.
     * 
     * @var array
     */
    private $_classes = array();
    
    /**
     * Allow to regenerate the list of classes.
     * 
     * @var array
     *  False by default.
     */
    private $_canRegenerate = FALSE;
    
    //--- Singleton
    /**
     * Disallow the access to the constructor.
     */
    private function __construct() {}
    
    /**
     * Allow only one instance of this class.
     * 
     * @return Autoloader 
     *  Return a single instance of the object.
     */
    static public function instance() {
        if(self::$_instance === FALSE) {
            self::$_instance = new Autoloader();
        }
        
        return self::$_instance;
    }
    //--- /Singleton
    
    /**
     * 
     */
    public function autoload($pClassName) {
        $pClassName = strtolower($pClassName);
        
        if(isset($this->_classes[$pClassName])) {
            require_once $this->_classes[$pClassName];
            
            return TRUE;
        } else if($this->_canRegenerate) {
            $this->_canRegenerate = FALSE;
            $this->_includesAll();
            
            return $this->autoload($pClassName);
        } else {
            return FALSE;
        }
    }
    
    /**
     * Allow to add a directory to load a class.
     * 
     * @param string $pDirectory
     *  This is the path to the directory to add.
     * 
     * @param boolean $pRecursive
     *  This parameter tells if it have to browse folders recursively.
     *  By default it is set to TRUE.
     * 
     * @return Autoloader 
     *  Return the instance of the object.
     */
    public function addDirectory($pDirectory, $pRecursive = TRUE) {
        if(!is_readable($pDirectory)) {
            throw new AutoloaderException('Cannot read from ['.$pDirectory.']');
        }
        
        $this->_directories[$pDirectory] = $pRecursive ? TRUE : FALSE;
        
        if(!$this->_canRegenerate) {
            $this->_canRegenerate = TRUE;
        }
        
        return $this;
    }
    
    /**
     * Check if the file are a class or interface and extract it.
     * 
     * @return array 
     *  Return an array with the classes we need to extract.
     */
    private function _extractClasses($pFileName) {
        $toReturn = array();
        $tokens = token_get_all(file_get_contents($pFileName, FALSE));
        $tokens = array_filter($tokens, 'is_array');
        
        $classHunt = FALSE;
        
        foreach($tokens as $token) {
            if($token[0] === T_INTERFACE || $token[0] === T_CLASS) {
                $classHunt = TRUE;
                continue;
            }
            
            if($classHunt && $token[0] === T_STRING) {
                $toReturn[$token[1]] = $pFileName;
                $classHunt = FALSE;
            }
        }
        
        return $toReturn;
    }
    
    /**
     * Include all class files they has been add to this class.
     */
    private function _includesAll() {
        foreach($this->_directories as $directory => $recursive) {
            $directories = new AppendIterator();
            
            // Adding every path to browse.
            if($recursive) {
                $directories->append(new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($directory)));
            } else {
                $directories->append(new DirectoryIterator($directory));
            }
            
            // This will filter the php files founds into repertories.
            $files = new ExtensionFilterIteratorDecorator($directories);
            $files->setExtension('.class.php');
            
            foreach($files as $fileName) {
                $classes = $this->_extractClasses((string) $fileName);
                
                foreach($classes as $className => $fileName) {
                    $this->_classes[strtolower($className)] = $fileName;
                }
            }
        }
    }
    
    public function getDirectories() {
        return $this->_directories;
    }
    
    public function getClasses() {
        return $this->_classes;
    }
}
