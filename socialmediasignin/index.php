<?php

$action = array_key_exists('code', $_GET)?'complete':(array_key_exists('action', $_POST)?$_POST['action']:'');
if($action == 'signin'){
	include 'model/starter.php';
}elseif($action=='complete'){
	include 'model/complete.php';
	$sProfile = base64_encode(json_encode($oProfile));
	setcookie('profile', $sProfile );
	$_COOKIE['profile']= $sProfile;
}
if(array_key_exists('profile', $_COOKIE)){
	$oProfile = json_decode(base64_decode($_COOKIE['profile']));
	include 'views/hello.php';
}
include 'views/signin.php';
?>
