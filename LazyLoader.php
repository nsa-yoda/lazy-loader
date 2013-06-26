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
 * @version 1.2.0
 * @internal 06.26.2013
 */

Namespace LazyLoader;

class LazyLoader{
    public static $dirRoot;
 
    public static function autoload($class_name){
		$file = dirname(__FILE__) . 
		        (strlen(self::$dirRoot) > 0 ? self::$dirRoot : "") . 
		        '/' . array_pop(explode("\\", $class_name)) . '.php';
				
		file_exists($file) ? require_once($file) : "";
    }
	
	public static function SetBaseDirectory($directory_root){
		self::$dirRoot = substr($directory_root, -1) == "\\" ? 
		                 substr($directory_root, 0, -1) : "";
	}
	
	public static function Register(){
		return spl_autoload_register(__NAMESPACE__ .'\LazyLoader::autoload');
	}
}
 
$LazyLoader = new LazyLoader;
