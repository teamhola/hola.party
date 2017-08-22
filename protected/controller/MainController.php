<?php
class MainController extends BaseController {
	function actionIndex(){
    	$speech = new Model("speech");
    	$this->records = $speech->findAll();
	}
	function actionJump(){
		header("Location: https://www.ihola.one/".arg("redirct")); 
	}
	function actionTalk(){
    	$db = new Model("speech");
			$this->records = $db->query("select * from speech where id=:id", 
											array(
												":id" => arg("id")
											)
										);
		//如果id对应的主题不存在的话
    	if(empty($this->records[0]['title']))header("Location: https://www.hola.party/talk-list"); 
		$this->events = $db->query("select * from events where eid=:eid", array(":eid" => $this->records[0]['eid']));
		$this->users = $db->query("select * from users where uid=:uid", array(":uid" => $this->records[0]['uid']));
		$this->catg = $db->query("select * from catg where cid=:cid", array(":cid" => $this->records[0]['cid']));
		$this->protocol = $db->query("select * from protocol where pid=:pid", array(":pid" => $this->records[0]['pid']));
        $this->display("main_talk.html");
	}	
}