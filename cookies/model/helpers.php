<?php
	function addCookie($sUsers){
		setcookie('username', $sUser);
		$_COOKIE['username'] = $sUser;
	} // End addCookie
	
	function addUser($aPost){
		if($_aPost['password'] == $aPost['repeatpassword']){
			$oUser = new User;
			$oUser->username = $aPost['username'];
			$oUser->password = $aPost['password'];
			$oUser->save();
		} // End if
		return false;
	} // End addUser
	
	function validateUser($aPost){
		if($_aPost['password'] == 'Secret55'){
			return true;
		} // End if
		return false;
	} // End validateUser
?>