<?php
	function addCookie($sUser){
		setcookie('username', $sUser);
		$_COOKIE['username'] = $sUser;
	} // End addCookie
	
	function addUser($aPost){
		$sError = "success";
		
		$oUser = User::find_by_username($aPost['username']);
		if($oUser){
			$sError = "username already taken";
		} // End if
		elseif($aPost['password'] != $aPost['repeatpassword']){
			$sError = "passwords don't match";
		} // End elseif
		else{
			$oUser = new User;
			$oUser->username = $aPost['username'];
			$oUser->password = sha1($aPost['username'] . $aPost['password']);
			$oUser->save();
		}
		return $sError;
	} // End addUser
	
	function validateUser($aPost){
		$oUser = User::find_by_username($aPost['username']);
		if($oUser && sha1($aPost['username'] . $aPost['password']) == $oUser->password){
			return true;
		} // End if
		return false;
	} // End validateUser
?>