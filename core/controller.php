<?php
//��ǰ�����ռ�
namespace system;

//��������
class controller{
	
	protected $view = null;
	
	public function __construct(){
		$view = new view;
		$this -> view = $view -> view;
	}
		
}