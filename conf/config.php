<?php
$config = array();
$config['db']['type']			=	'mysql';
$config['db']['host']			=	'172.16.1.63';
$config['db']['database']		=	'spider';
$config['db']['username']		=	'spider';
$config['db']['password']		=	'123456';
$config['db']['charset']		=	'utf8';
$config['db']['collation']		=	'utf8_unicode_ci';
$config['db']['prefix']			=	'';

$config['view']['path'] = 'app/view/';
$config['view']['cache'] = 'app/cache/';

$config['app']['default']['controller_name'] = "index";
$config['app']['default']['action_name'] = "index";
$config['app']['default']['construct'] = "__start";
