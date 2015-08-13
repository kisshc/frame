<?php
namespace system;

class init{
	public static function start(){
		$request = new request;
		$controller_namespace = "app\\controller\\";	
		//默认 action
		if($request -> IS_GET){
			$controller = $request -> fetch("get.c");
			$action = $request -> fetch("get.a");
		}
		if($request -> IS_POST){
			$controller = $request -> fetch("post.c");
			$action = $request -> fetch("post.a");			
		}
		
		$config = C("app.default");
		if(!$controller){		
			$controller = $config['controller_name'];
		}
		if(!$action){
			$action = $config['action_name'];
		}
		
		$controller = $controller_namespace . $controller . "Controller";		
		
		if(!class_exists($controller))
			throw new exception("{$controller} : Controller not found");
		
		if(!method_exists($controller,$action))
			throw new exception("{$action} : action not found on {$controller}");
		
		call_user_func_array(array(new $controller,$action),array($request));
	}
	
}
