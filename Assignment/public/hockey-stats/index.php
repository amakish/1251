<?php
	// ******************************************************
	// Active Record
	// ******************************************************
	require_once('../../adodb5/adodb.inc.php');
	require_once('../../adodb5/adodb-active-record.inc.php');
	
	// print_r($_SERVER);
	$db = NewADOConnection('mysql');
	if($_SERVER['SERVER_NAME'] == 'localhost'){
		$db->Connect("localhost", "root", "", "nhl");
	}
	else{
		$db->Connect('amakish.netfirmsmysql.com', 'amakish', '1gdsac5t7*krs2', "nhl");
	}	
	
	ADOdb_Active_Record::SetDatabaseAdapter($db);
	class sktrstat extends ADOdb_Active_Record{}
	class goaliestat extends ADOdb_Active_Record{}
	class schedule extends ADOdb_Active_Record{}
		
	// ******************************************************
	// Views Control
	// ******************************************************
	$action = (array_key_exists('action', $_POST)?$_POST['action']: '');
	$action = (array_key_exists('action', $_GET)?$_GET['action']: $action);
	
	if($action == '' || $action == 'pStats'){
		include '../../views/sktrstatscoring.php';
	} // End if
	elseif($action == 'tSchedule'){
		include '../../views/schedule.php';
	} // End if
	
	elseif($action == 'scrape1'){
		include '../../model/dataSktrStats.php';
	} // End if
	elseif($action == 'scrape2'){
		include '../../model/dataGoalieStats.php';
	} // End if
	elseif($action == 'scrape3'){
		include '../../model/dataSched.php';
	} // End if
?>