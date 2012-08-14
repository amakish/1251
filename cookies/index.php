<?php
	if(array_key_exists('username', $_POST)){
		setcookie('username', $_POST['username']);
		$_COOKIE['username'] = $_POST['username'];
	} // End if
	
	if(array_key_exists('username', $_COOKIE)){
		include 'views/hello.php';
	} // End if
	else {
		include 'views/form.php';
	} // End else
?>