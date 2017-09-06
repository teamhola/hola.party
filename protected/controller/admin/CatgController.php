<?php
class CatgController extends BaseController{
	function actionIndex(){
		$catg = new Model("catg");
		$this->records = $catg->findAll();
	}
}