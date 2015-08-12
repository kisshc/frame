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
	}
	
	/**
	*	get 获取安全$_GET值
	*/	
	public function get($map){
		return $this -> fetch($this -> get,$map);
	}
	
	/**
	*	post 获取安全$_POST值
	*/	
	public function post($map){
		return $this -> fetch($this -> post,$map);
	}
	
	/**
	*	fetch map处理返回其值
	*/	
	private function fetch($data,$map){
		$arr = explode(".",$map);
		if(is_array($arr) && count($arr) > 1){
			foreach($arr as $v){
				$data = $data[$v];
			}
			return $data;
		}else{
			return $data[$map];
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
