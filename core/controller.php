<?php
//当前命名空间
namespace system;

//控制器类
class controller{
	
	protected $view = null;
	
	public function __construct(){
		$view = new view;
		$this -> view = $view -> view;
	}
		
}