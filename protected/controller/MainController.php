<?php
class MainController extends BaseController {
	// 首页
	function actionIndex(){
		// 连个hello world都木有？
    	// 实例化一个guestbook的模型类
    	$speech = new Model("speech");
    	// 用findAll()方法查询guestbook表的全部数据
    	$this->records = $speech->findAll();
    	// 输出看看
    	//dump($this->records);
    	// 为了清楚看到输出，我们先屏蔽页面输出
    	//$this->display("guestbook.html");
		// 回答：页面自动输出，请看main_index.html
	}
	function actionJump(){
		header("Location: https://www.ihola.one/".arg("redirct")); 
	}
	
	// 接收提交表单
	function actionReceive(){
		// 把提交的数据先dump($_POST)出来看看是良好的习惯。
		
		if(isset($_POST["username"])){
			echo "已经提交了".$_POST["username"];
		}else{
			echo "没有填东东呢";
		}
	}
	function actionTalk(){
		// 连个hello world都木有？
    	// 实例化一个guestbook的模型类
    	
    	$db = new Model("speech");
			$this->records = $db->query("select * from speech where id=:id", 
    array(
        ":id" => arg("id")
    )
);
    	
    	// 输出看看
    	//dump();
    	if(empty($this->records[0]['title']))header("Location: https://www.hola.party/talk-list"); 
		$this->events = $db->query("select * from events where eid=:eid", array(":eid" => $this->records[0]['eid']));
		$this->users = $db->query("select * from users where uid=:uid", array(":uid" => $this->records[0]['uid']));
		$this->catg = $db->query("select * from catg where cid=:cid", array(":cid" => $this->records[0]['cid']));
		$this->protocol = $db->query("select * from protocol where pid=:pid", array(":pid" => $this->records[0]['pid']));
    	//dump($this->events);
    	//echo($this->events[0]["name"]);
    	
        $this->display("talk.html");
    	// 为了清楚看到输出，我们先屏蔽页面输出
    	//$this->display("guestbook.html");
		// 回答：页面自动输出，请看main_index.html
	}	
}