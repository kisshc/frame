> file

newsController.php

```
<?php
//当前命名空间
namespace app\controller;
//使用刚才创建的控制器类
use system\controller;
//使用刚创建的应用模型
use app\model\newsModel;
//应用控制器
class newsController extends controller{
	
    //应用方法
	public function article(){
		//使用模型调用数据 find方法来自illuminate提供的扩展包中
		$data = newsModel::find($_GET['id']);
		$data = array(
			"ID" => $data -> ID,
			"TITLE" => $data -> TITLE,
			"CREATE_TIME" => $data -> CREATE_TIME,
			"CONTENT" => $data -> CONTENT,
		);
		//渲染模板
		$template = $this -> view -> loadTemplate('news.html');
		echo $template->render($data);
	}
}
```