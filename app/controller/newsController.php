<?php
//��ǰ�����ռ�
namespace app\controller;
//ʹ�øղŴ����Ŀ�������
use system\controller;
//ʹ�ö�Ӧmodule
use app\model\newsModel;

//Ӧ�ÿ�����
class newsController extends controller{
	
    //Ӧ�÷���
	public function article(){
		print_r(newsModel::find1(1));
	}
}