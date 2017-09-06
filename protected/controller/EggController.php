<?php
class EggController extends Controller {
	function actionIndex(){
    	if(arg("log")){
    	    $this->error=1;
    	}else{
    	    $this->error=0;
    	}
	}
}