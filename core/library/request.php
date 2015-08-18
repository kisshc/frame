<?php
namespace system;

class request{
	
	/**
	*	IS_POST 请求为POST请求
	*/
	public $IS_POST = NULL;
	
	/**
	*	IS_GET 请求为GET请求
	*/	
	public $IS_GET = NULL;
	
	/**
	*	IS_AJAX 请求为AJAX请求
	*/	
	public $IS_AJAX = NULL;
	
	/**
	*	IS_PUT 请求为PUT请求
	*/	
	public $IS_PUT = NULL;
	
	/**
	*	controller 控制器
	*/	
	public $controller = NULL;	
	
	/**
	*	action 动作
	*/	
	public $action = NULL;		
	
	/**
	*	get 存储$_GET数组
	*/		
	private $get = array();
	
	/**
	*	post 存储$_POST数组
	*/		
	private $post = array();
	
	
	public function __construct(){
		if($_SERVER['CONTENT_TYPE'])
			$this -> IS_AJAX = true;
		
		switch($_SERVER['REQUEST_METHOD']){
			case "GET":$this -> IS_GET = true;break;
			case "POST":$this -> IS_POST = true;break;
			case "PUT":$this -> IS_PUT = true;break;
			// default:$this -> IS_GET = true;
		}
		
		$this -> get = $this -> fetchGet();
		$this -> post = $this -> fetchPost();
		unset($_GET);
		unset($_POST);		
		
		//获取controller和action
		if(!empty($_SERVER['QUERY_STRING'])){
			$this -> controller = $this -> fetch("get.c",C("app.default.controller_name"));
			$this -> action = $this -> fetch("get.a",C("app.default.action_name"));
		}else{
			$this -> controller = $this -> fetch("post.c",C("app.default.controller_name"));
			$this -> action = $this -> fetch("post.a",C("app.default.action_name"));	
			//	PUT DELATE ...		
		}
		
	}
	
	/**
	*	get 获取安全$_GET值
	*/	
	// public function get($map){
		// return $this -> fetch($this -> get,$map);
	// }
	
	/**
	*	post 获取安全$_POST值
	*/	
	// public function post($map){
		// return $this -> fetch($this -> post,$map);
	// }
	
	/**
	*	fetch map处理返回其值
	*/	
	public function fetch($map,$default = ""){
		$arr = explode(".",$map);
		$type = $arr[0];
		unset($arr[0]);
		if(is_array($arr)){
			$data = array();
			switch(strtolower($type)){
				case "get":$data = $this -> get;break;
				case "post":$data = $this -> post;break;
				default:$data = $this -> get;
			}
			foreach($arr as $v){
				if($v == '')
					break;
				$data = $data[$v];
			}
			return $data ? $data : $default;
		}else{
			return $data[$map] ? $data[$map] : $default;
		}		
	}
	
	/**
	*	get 获取安全$_GET值
	*/		
	private function fetchGet(){
		$get = $_GET;
		return $this -> safeRequest($get);
	}
	
	/**
	*	post 获取安全$_POST值
	*/	
	private function fetchPost(){
		$post = $_POST;
		return $this -> safeRequest($post);
	}
	
	/**
	*	安全过滤
	*/	
	private function safeRequest($request){
		$request = $this -> sqlInjection($request);
		return $request;
	}
	
	
	/**
	*	sql 注入
	*/	
	private function sqlInjection($request){
		return $request;
	}
}
