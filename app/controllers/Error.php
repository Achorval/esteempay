<?php

class AppError extends BaseController {
	
	public function __construct() {
		
		parent::__construct();
			
	}
	
	
	public function index() {
	
		$this->view->render("error/errorpage");  
		
	}
	
	
	
}