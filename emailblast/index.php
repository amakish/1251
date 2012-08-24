<?php
	
	$action = (array_key_exists('action', $_POST)?$_POST['action']: '');
	$action = (array_key_exists('action', $_GET)?$_GET['action']: $action);
	
	require '../ActiveRecord/ActiveRecord.php';
	
	ActiveRecord\Config::initialize(function($cfg)
	{
		$cfg->set_model_directory('model');
		$cfg->set_connections(
				array(
					'development' => 'mysql://root:@localhost/emails',
					'test' => 'mysql://username:password@localhost/test_database_name',
					'production' => 'mysql://username:password@localhost/production_database_name'
				)
		);
	});
	
	if($action == 'Subscribe'){
		$oEmail = new Email;
		$oEmail->email = $_POST['email'];
		$oEmail->save();
	} // End if
	elseif($action == 'Delete'){
		$oEmail = Email::find_by_email($_GET['email']);
		if($oEmail && $oEmail->delete()){
			echo "1 email address deleted";
		} // End inner if
	} // End elseif
	elseif($action == 'Unsubscribe'){
		$oEmail = Email::find_by_email($_GET['email']);
		if($oEmail && $oEmail->delete()){
			echo "You have been unsubscribed";
		} // End inner if
		else{
			echo "Unsubscription failed";
		} // End inner else
		exit();
	} // End elseif
	elseif($action == 'Send'){
		include 'model/helpers.php';
		sendEmails();
	} // End elseif
	
	if($action == '' || $action == 'Send'){
		include 'views/email.php';
	} // End if
	else{
		include 'views/edit.php';
	} // End else
	
?>