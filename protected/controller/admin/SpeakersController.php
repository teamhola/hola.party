<?php
class SpeakersController extends BaseController{
	function actionIndex(){
		$speakers = new Model("users");
		$this->records = $speakers->query("select * from users where `group`=1");
	}
	function actionEdit(){
		if(arg("name") && isset($_SESSION['admin'])) {
    	    $entry_condition = array('uid' => arg("uid"));
    	    $edit_entry = array(
                'name' => arg("name"),
                "full_name" => arg("full_name"),
                "group" => 1
            );
    	    $db->update($entry_condition , $edit_entry);
    	    header("Location: /admin/speakers_index.html"); 
		} else if(arg("id")) {
			$db = new Model("users");
			$this->records = $db->query("select * from users where uid=:uid", array(":uid" => arg("id")));
			if(!$this->records) {
			    header("Location: /admin/speakers_index.html"); 
			}
		} else {
		    header("Location: /admin/speakers_index.html"); 
		}
	}
	function actionAdd(){
	    $db = new Model("users");
        if(arg("name") && isset($_SESSION['admin'])) {
    	    $add_entry = array(
                'name' => arg("name"),
                'password' => md5(arg("password")),
                "full_name" => arg("full_name"),
                "group" => 1
            );
    	    $db->create($add_entry);
    	    header("Location: /admin/speakers_index.html"); 
	    }	    
	}
}