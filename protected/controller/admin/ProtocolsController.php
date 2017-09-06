<?php
class ProtocolsController extends BaseController{
	function actionIndex(){
		$protocols = new Model("protocol");
		$this->records = $protocols->findAll();
	}
}