<?php
namespace system;
class exception extends \exception{
	
	public function __construct($msg){
		parent::__construct($msg);
	}
	
	public function message(){
		$msg = <<<msg
			<div style="width:80%; height:auto; margin:8% auto;
				background:#eee; padding:18px; border-radius: 2px;
				text-shadow: 0 1px 0 #eee; box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
				font-size: 16px; line-height: 1.8; color: #333;
				font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,STHeiti,"Microsoft Yahei",sans-serif;
			">
				{$this -> getMessage()} 
				in 
				<b>{$this -> getFile()}</b>
				on line 
				{$this -> getLine()}
			</div>
msg;
		return $msg;
	}
	
}