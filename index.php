<?php
//这个定义linux和windows中的引入路径的分隔符 linux \ windows /
define("DIR_SIGN",DIRECTORY_SEPARATOR);

//定义程序目录
define("APP_PATH", __DIR__ . DIR_SIGN);

//引入程序入口文件
include_once(APP_PATH . "core" . DIR_SIGN . "app.php");