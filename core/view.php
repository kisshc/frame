<?php
//当前命名空间
namespace system;

//view父类
class view{
	public $view = null;
	public function __construct(){
		//使用composer安装的twig模板引擎
		\Twig_Autoloader::register();
		$config = C("view");
		$loader = new \Twig_Loader_Filesystem(APP_PATH . $config['path']);
		$twig = new \Twig_Environment($loader, array(
			'cache' => APP_PATH . $config['cache'],
		));
		$this -> view = $twig;
	}
}