<?php
class EventsController extends BaseController{
	function actionIndex(){
		$events = new Model("events");
		$this->records = $events->findAll();
	}
}