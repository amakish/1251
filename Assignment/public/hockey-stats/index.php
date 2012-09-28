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
		
		$sSktrStats = new sktrstat();
		$aSktrStats = $sSktrStats->find("1 order by pts desc");
		include '../../views/sktrstatscoring.php';
		
	} // End if
	
	elseif($action == 'Search'){
		// Temp print POST array
		print_r($_POST);
		
		$sSktrStats = new sktrstat();
		// initialize where clause to be empty
		$sWhere = "";
		
		$sSeason	 	= ($_POST['season']);
		$sGameType 		= ($_POST['gameType']);
		$sTeam 			= ($_POST['team']);
		$sPosition 		= ($_POST['position']);
		$sStatView 		= ($_POST['statView']);
		$sPlayerStatus 	= ($_POST['playerStatus']);
		
		if($sPosition == 'Fwd' || $sPosition == 'Def' ) {
			$sPosition = 'sktrstat';
		}
		else {
			$sPosition = 'goaliestat';
		}
		
		$sTable = "team='"	. $sTeam . "gameType='" . $sGameType . "position='" . $sPosition . "'";
		
		//$oPlayer = new $sTable;
		
		//$aSktrStat = $oPlayer->find($sWhere....);
		
		include '../../views/sktrstatscoring.php';
		
		print_r($sTable);
	}
	
	/*
	 
	 if($sPosition == 'Fwd') {
	 	$sPosition = sktrstat;
	 }
	 else {
	 	$sPosition = goaliestat;
	 }
	 
	 $sTable = $sSeason . $sGameType . $sPosition;
	 
	 $sView = $sStatView;
	 
	 $oPlayer = new $sTable;
	 
	 $aSktrStat = $oPlayer->find($sWhere....);
	 
	 include '../../views/$sView.php';
	 
	 */	

	
	
	// ******************************************************
	// Data Scrape Control
	// ******************************************************	
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