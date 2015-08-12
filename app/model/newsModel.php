<?php
//当前命名空间
namespace app\model;
//应用我们刚才创建的父类
use system\model;
//继承父类并创建数据库链接
class newsModel extends model{
	//所操作的数据表 可选
    protected $table = "data_612";
	//表的自增ID 可选
    protected $primaryKey = "ID";
}