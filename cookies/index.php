<?php
	// make sure the page uses a secure commection (https)
	if (!isset($_SERVER['HTTPS'])) {
		// then we are not on https
		$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		// echo $url . "\n";
		// print_r($_SERVER);
		header("Location: " . $url);
		exit();
	} // End if

	// setup database
	require '../ActiveRecord/ActiveRecord.php';
	
	ActiveRecord\Config::initialize(function($cfg)
	{
		$cfg->set_model_directory('model');
		$cfg->set_connections(
				array(
					'development' => 'mysql://root:@localhost/users',
					'test' => 'mysql://username:password@localhost/test_database_name',
					'production' => 'mysql://username:password@localhost/production_database_name'
				)
		);
	});
	
	require 'model/helpers.php';
	
	//controller logic
	print_r($_POST);
	
	if(array_key_exists('action', $_POST)){
		if($_POST['action'] == 'signup'){
			include 'views/signup.php';
			exit();
		} // End if
		elseif($_POST['action'] == 'save'){
			addUser($_POST);
			addCookie($_POST['username']);
		} // End inner elseif
		elseif($_POST['action'] == 'signin'){
			if(validateUser($_POST)){
				addCookie($_POST['username']);
			} // End inner inner if
			else{
				echo 'invalid user';
			} // End inner inner else
		} // End inner elseif
	} // End if
	
	if(array_key_exists('username', $_COOKIE)){
		include 'views/hello.php';
	} // End if
	
	include 'views/form.php';
?>
	