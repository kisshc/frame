<?php
namespace system;

class init{
	public static function start(){
		//这里只是简单的过去控制器及操作方法的名称
		$c = "app\\controller\\".$_GET['c'] . "Controller";
		$a = $_GET['a'];
		//调用类方法 分发
		call_user_func_array(array(new $c,$a),array());
	}
}
