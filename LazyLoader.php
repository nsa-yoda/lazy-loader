<?php

/**
 * LazyLoader
 * A fast, strict lazy loader (time ~ 0.0001)
 * 
 * Class name must match File name.
 * If class has namespace, must be called via namespace.
 *
 * @author Juan L. Sanchez <juanleonardosanchez.com>
 * @license MIT
 * @version 1.3.0
 * @internal 06.26.2013
 */

Namespace LazyLoader;

class LazyLoader{
    public static $directory_root;
 
    public static function autoload($class_name) {
        // Remove namespaces
        $class_name = explode("\\", $class_name);
        $class_name = array_pop($class_name);
        
        // Create filename w/ base 
        $base = dirname(__FILE__) . (strlen(self::$directory_root) > 0 ? self::$directory_root : "");
        $file = $base . '/' . $class_name . '.php';
        
        if(file_exists($file)){
            require_once($file);
        }
    }
    
    public static function SetBaseDirectory($directory_root){
        // Check if last character is a slash
        $reverse = strrev($directory_root);
        if($reverse[0] == "/" || $reverse[0] == "\\"){
            unset($reverse[0]);
            $directory_root = strrev($reverse);
        }
        
        self::$directory_root = $directory_root;
    }
    
    public static function Register(){
        return spl_autoload_register(__NAMESPACE__ .'\LazyLoader::autoload');
    }
}

$LazyLoader = new LazyLoader;