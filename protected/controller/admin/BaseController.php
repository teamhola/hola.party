<?php
class BaseController extends Controller{
    public $layout = "admin/layout.html";
	
	function init(){
		header("Content-type: text/html; charset=utf-8");
		session_start();
		if(!isset($_SESSION['admin']) && $_SERVER["REQUEST_URI"]!="/admin/main_login.html")header("Location: /admin/main_login.html"); 
	    //echo $_SERVER["REQUEST_URI"];
	    
	}
} 