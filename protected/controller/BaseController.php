<?php
class BaseController extends Controller{
	public $layout = "layout.html";
	
	function init(){
		header("Content-type: text/html; charset=utf-8");
	}

	
	//public static function err404($module, $controller, $action, $msg){
	//	header("HTTP/1.0 404 Not Found");
	//	exit;
	//}
} 