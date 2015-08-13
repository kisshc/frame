<?php
//这里就用到了刚才composer安装生成的autoload.php文件了
//作用是自动引入类文件
include_once(APP_PATH . "vendor/autoload.php");
include_once(APP_PATH . "conf/config.php");
include_once(APP_PATH . "core/library/functions.php");


date_default_timezone_set("UTC");

use system\exception;
use system\init;

try{
	init::start();
}catch(exception $e){
	echo $e -> message();
}
