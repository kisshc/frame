<?php
namespace system;
class instance{
	
	private static $_Instance = array();
	
	private function __construct(){}
	private function __clone(){}
	
	public static function getInstance($class_name = ''){
		$class_name = __NAMESPACE__ . '\\' . $class_name;
		
        if(!isset(self::$_Instance[$class_name])){
            self::$_Instance[$class_name] = null;
            if(!is_object(self::$_Instance[$class_name])){
                self::$_Instance[$class_name] = new $class_name;
            }
        }
		
        return self::$_Instance[$class_name];
    }	
	
}