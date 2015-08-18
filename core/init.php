<?php
namespace system;

class init{
	public static function start(){
		$request = instance::getInstance("request");
		$controller_namespace = "app\\controller\\";
		
		$controller = $request -> controller;
		$action = $request -> action;
		$controller = $controller_namespace . $controller . "Controller";		
		
		if(!class_exists($controller))
			throw new exception("{$controller} : Controller not found");
		if(!method_exists($controller,$action))
			throw new exception("{$action} : action not found on {$controller}");
		
		call_user_func_array(array(new $controller,$action),array());
	}
	
}
