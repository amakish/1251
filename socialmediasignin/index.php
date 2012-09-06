<?php
	$action = array_key_exists('code', $_GET)?'complete':(array_key_exists('action', $_POST)?$_POST['action']:'');

	require '../ActiveRecord/ActiveRecord.php';
	
	ActiveRecord\Config::initialize(function($cfg)
	{
		$cfg->set_model_directory('model');
		$cfg->set_connections(
				array(
						'development' => 'mysql://root:@localhost/sessions',
						'test' => 'mysql://username:password@localhost/test_database_name',
						'production' => 'mysql://username:password@localhost/production_database_name'
				)
		);
	});
	
	if($action == 'signin'){
		include 'model/starter.php';
	} // End if
	elseif($action=='complete'){
		include 'model/complete.php';
		
		// add user if they don't already exist
		$sSocialId = 'google:' . $oProfile->id;
		$oUser = User::find_by_social_id($sSocialId);
		if(!$oUser){
			$oUser = new User;
			$oUser->social_id = $sSocialId;
			$oUser->name = $oProfile->name;
			$oUser->save();
		} // End if
		
		// create a session
		$oSession = new Session;
		$oSession->user_id = $oUser->id;
		$oSession->session_id = base64_encode(uniqid()); // base64_encode encodes to a string, uniqid creates a unique id to be stored in the db
		$oSession->save();

		setcookie('session', $oSession->session_id);
		$_COOKIE['session']= $oSession->session_id;
	} // End elseif
	
	if(array_key_exists('session', $_COOKIE)){
		
		// if I have a session, retrieve username from session
		
		$oSession = Session::find_by_session_id($_COOKIE['session']);
		$oProfile = User::find($oSession->user_id);
		include 'views/hello.php';
	} // End if
	
	include 'views/signin.php';
?>
