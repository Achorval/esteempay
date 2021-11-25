<?php

class View {
	
	public function render($name, $param = false) {
		
		$file = 'resources/views/'.$name.'.php';
		
		if (file_exists($file)){
				
		require_once $file;
				
		}
		
		else {
		
		require_once 'resources/views/error/errorpage.php';	
			
		}
		
	}
	
}