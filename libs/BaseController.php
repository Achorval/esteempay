<?php

class BaseController {

	public function __construct() {
        $this->view = new View();
		$this->view->model = new Model();


	}


	public function loadModel($name) {
		$path = 'app/models/'.$name.'_model.php';

		if(file_exists($path)) {
			require 'app/models/'.$name.'_model.php';

			$modelName = $name.'_model';

			$this->model = new $modelName();
		}
	}

	public function loadModelA($name) {
		$path = 'app/models/'.$name.'_model.php';

		if(file_exists($path)) {
			require 'app/models/'.$name.'_model.php';

			$modelName = $name.'_model';

			return new $modelName();
		}
	}

	public function redirect($url)	{

        header("location: {$url}");

    }

	public function check() {
		echo Hash::create('sha256', 'test', HASH_PASSWORD_KEY);
		$this->view->render('login/index');
	}

}
