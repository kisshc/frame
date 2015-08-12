<?php
namespace system;

class init{
	public static function start(){
		$request = new request;
		//这里只是简单的过去控制器及操作方法的名称
		$controller = $request -> fetch("get.c") . "Controller";
		$controller_namespace = "app\\controller\\";
		$controller_class = $controller_namespace . $controller;
		$method = $request -> fetch("get.a");
		
		if(!class_exists($controller_class))
			throw new exception("{$controller_class} : Controller not found");
		
		if(!method_exists($controller_class,$method))
			throw new exception("{$method} : Method not found on {$controller_class}");
		
		call_user_func_array(array(new $controller_class,$method),array($request));
	}
}
