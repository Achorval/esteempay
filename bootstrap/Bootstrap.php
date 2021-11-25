<?php

class Bootstrap {

	private $_controller = null;

	public function __construct() {

		//SET THE URL
		$url =  isset($_GET['url']) ? explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)) : null;

		$file = 'app/controllers/' . $url[0] . '.php';

		if (empty($url[0])) {

			//LOAD THE DEFAULT CONTROLLER IF URL IS EMPTY
			$this->_loadDefaultController();

		} else if (file_exists($file)) {

			//LOAD THE EXISTING CONTROLLER
			$this->_loadExistingController($file);

             $this->_controller = new $url[0];

		     $this->_controller->loadModel($url[0]);



		//LOAD THE CONTROLLER METHOD
		     $this->_callControllerMethod($url);

		}
        else if (!file_exists($file)) {

            require 'app/controllers/main.php';

             $this->_controller = new Main;

            $this->_controller->loadModel("main");

						$urlA = $url[0];

            if(method_exists($this->_controller,$urlA)){

                if(isset($url[1])){

                   $this->_controller->$urlA($url[1]);

								}
								else {

                  $this->_controller->$urlA();

								}

            }
            else
            {

                $this->error();

            }

			//LOAD THE EXISTING CONTROLLER
			//$this->_loadExistingController($file);
            /*
            require_once "../app/controllers/engine.php";

            $this->_controller = new Engine;
		    $this->_controller->loadModel('engine');

            $controller = $this->_controller->index($url[0]);

            $controller1 = "../app/controllers/".$controller.".php";

            $this->_loadExistingController($controller1);

            $this->_controller = new $controller;
		    $this->_controller->loadModel($controller);

            $this->_callControllerMethod1($url);  */


		}
        else {

			//LOAD THE ERROR PAGE
			$this->error();

		}

	}


	private function _loadDefaultController() {
		require 'app/controllers/main.php';
		$this->_controller = new Main;
		$this->_controller->index();
		exit;
	}


	private function _loadExistingController($file) {

		require_once $file;


	}

	/**
	*http://localhost/controller/method/(parameter)
	* @$url[0] = CONTROLLER
	* @URL[1]  = METHOD
	* @URL[2]  = PARAMETERS
	**/
	private function _callControllerMethod($url) {

		if (isset($url[2])) {

			if (method_exists($this->_controller, $url[1])) {
				$this->_controller->{$url[1]}($url[2]);
			} else {
				$this->error();
			}

		} else {

			if (isset($url[1])) {
				if (method_exists($this->_controller, $url[1])) {
					$this->_controller->{$url[1]}();
				} else {
					$this->error();
				}

			} else {
				$this->_controller->index();
			}
		}

	}

    private function _callControllerMethod1($url) {

		if (isset($url[3])) {

			if (method_exists($this->_controller, $url[2])) {
				$this->_controller->{$url[2]}($url[3]);
			} else {
				$this->error();
			}

		} else {

			if (isset($url[2])) {
				if (method_exists($this->_controller, $url[2])) {
					$this->_controller->{$url[2]}();
				} else {
					$this->error();
				}

			} else {
				$this->_controller->index($url[0]);
			}
		}

	}


    private function error() {

		require 'app/controllers/Error.php';
		$this->_controller = new AppError;
		$this->_controller->index();
		exit;

	}

}
