<?php
//当前命名空间
namespace system;

//使用Composer安装的Model
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

//创建model类继承，并创建连接
class model extends \Illuminate\Database\Eloquent\Model{
	public function __construct(){
		$capsule = new Capsule;
		$config = C("db");
		$capsule->addConnection([
			'driver'    => $config['type'],
			'host'      => $config['host'],
			'database'  => $config['database'],
			'username'  => $config['username'],
			'password'  => $config['password'],
			'charset'   => $config['charset'],
			'collation' => $config['collation'],
			'prefix'    => $config['prefix'],
		]);		
		$capsule->setEventDispatcher(new Dispatcher(new Container));
		$capsule->setAsGlobal();
		$capsule->bootEloquent();
	}	
}