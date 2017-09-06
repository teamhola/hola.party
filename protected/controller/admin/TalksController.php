<?php
class TalksController extends BaseController{
	function actionIndex(){
		$talks = new Model("speech");
		$this->records = $talks->findAll();
	}
	function actionEdit(){
		if(arg("id")) {
			$db = new Model("speech");
            if(arg("title") && isset($_SESSION['admin'])) {
        	    $entry_condition = array('id' => arg("id"));
        	    $edit_entry = array(
                    'cid' => arg("cid"),
                    'img' => arg("img"),
                    'title' => arg("title"),
                    "uid" => arg("uid"),
                    "eid" => arg("eid"),
                    "tencent" => arg("tencent"),
                    "youtube" => arg("youtube"),
                    "bilibili" => arg("bilibili"),
                    "desc" => arg("desc"),
                    "pid" => arg("pid"),
                    "visibility" => arg("visibility")
                );
        	    $db->update($entry_condition , $edit_entry);
        	    header("Location: /admin/talks_index.html"); 
    	    } else {
    			$this->records = $db->query("select * from speech where id=:id", array(":id" => arg("id")));
    			if($this->records) {
        			$this->events = $db->query("select * from events");
    		        $this->users = $db->query("select * from users");
    		        $this->catg = $db->query("select * from catg");
    		        $this->protocol = $db->query("select * from protocol");
    			}else{
    			    header("Location: /admin/talks_index.html"); 
    			}
    	    }
		} else {
		    header("Location: /admin/talks_index.html"); 
		}
	}
	function actionAdd(){
	    $db = new Model("speech");
		$this->events = $db->query("select * from events");
        $this->users = $db->query("select * from users");
        $this->catg = $db->query("select * from catg");
        $this->protocol = $db->query("select * from protocol");
        if(arg("title") && isset($_SESSION['admin'])) {
    	    $add_entry = array(
                'cid' => arg("cid"),
                'img' => arg("img"),
                'title' => arg("title"),
                "uid" => arg("uid"),
                "eid" => arg("eid"),
                "tencent" => arg("tencent"),
                "youtube" => arg("youtube"),
                "bilibili" => arg("bilibili"),
                "desc" => arg("desc"),
                "pid" => arg("pid"),
                "visibility" => arg("visibility")
            );
    	    $db->create($add_entry);
    	    header("Location: /admin/talks_index.html"); 
	    }
	}
}