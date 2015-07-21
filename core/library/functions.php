<?php

function C($map){
	global $config;
	$map = explode(".",trim($map,'.'));
	$arr = $config;
	foreach($map as $k){
		$arr = $arr[$k];
	}
	return $arr;	
}