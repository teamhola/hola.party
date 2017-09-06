<?php
class MainController extends BaseController{
	function actionIndex(){
		/* Not necessary anymore, see BaseController for more information
		if(isset($_SESSION['admin'])) {
		    $this->admin = $_SESSION['admin']; 
		} else {
		    $this->admin = 0;
		}
		
		$users = new Model("users");
		if(isset($_SESSION['uid'])) {
			$this->users = $users->query("select * from users where uid=:uid", array(":uid" => $_SESSION['uid']));
			if(!empty($this->users) && $this->users[0]['group']=='2') {
				$this->admin = 1; 
			}
		}
		*/
	}
	function actionLogin(){
	    if(isset($_SESSION['admin'])) header("Location: /admin/index.html"); 
		if( arg("username") && arg("password") ) {
			//input DO exist
			$users = new Model("users");
			$this->users = $users->query("select * from users where name=:username", array(":username" => arg("username")));
			//dump($this->users);
			if($this->users && md5(arg("password"))==$this->users[0]['password']) {
				$_SESSION['uid'] = $this->users[0]['uid'];
				if($this->users[0]['group']=='2')$_SESSION['admin'] = 1; 
				header("Location: /admin/index.html"); 
			}else{
			    echo "Authorization Failed, please re-check your password :-) ";
			}
		}
	}
	function actionLogout(){
        $_SESSION = array();
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-42000, '/');
        }
        session_destroy();
        header("Location: /admin/index.html"); 
	}
}