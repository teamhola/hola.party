<?php
class TalkController extends BaseController {
	// 首页
	function actionInfo(){
	    echo arg("id");
		// 连个hello world都木有？
    	// 实例化一个guestbook的模型类
    	/*$this->display("talk.html");
    	$db = new Model("speech");
			$this->records = $db->query("select * from speech where id=:id", 
    array(
        ":id" => arg("id")
    )
);
    	
    	// 输出看看
    	dump($this->records);*/
    	// 为了清楚看到输出，我们先屏蔽页面输出
    	//$this->display("guestbook.html");
		// 回答：页面自动输出，请看main_index.html
	}
	
}