<?php
//当前命名空间
namespace app\controller;
//使用刚才创建的控制器类
use system\controller;
//使用对应module
use app\model\newsModel;

//应用控制器
class newsController extends controller{
	
    //应用方法
	public function article(){
		print_r(newsModel::find1(1));
	}
}