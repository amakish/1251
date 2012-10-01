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
	class reg201112sstat extends ADOdb_Active_Record{}
	class reg201112gstat extends ADOdb_Active_Record{}
	class tschedule extends ADOdb_Active_Record{}
	
	// ******************************************************
	// Views Control
	// ******************************************************
	$action = (array_key_exists('action', $_POST)?$_POST['action']: '');
	$action = (array_key_exists('action', $_GET)?$_GET['action']: $action);
	
	if($action == '' || $action == 'pStats'){
		$sSktrStats = new reg201112sstat();
		$aPlayerStats = $sSktrStats->find("1 order by pts desc");
		include '../../views/sstatscoring.php';
	} // End if
	
	elseif($action == 'tSchedule'){
		$sGame = new reg201112sstat();
		$aTsched = $sGame->find("1 order by date desc");
		include '../../views/tschedule.php';
	} // End if
	
	elseif($action == 'Search'){
		$sSeason	 	= ($_POST['season']);
		$sGameType 		= ($_POST['gameType']);
		$sTeam 			= ($_POST['team']);
		$sPposition 	= ($_POST['position']); /* s, f, d or g */
		$sStatView 		= ($_POST['statView']);
		$sPlayerStatus 	= ($_POST['playerStatus']);
		
		print_r($_POST);
		
		if($sPposition == "g") {
			$sPosition = "gstat";
		}
		else {
			$sPosition = "sstat";
		}
		
		$sTable = $sGameType . $sSeason . $sPosition;
		$sView = $sStatView;

		$sWhere = "";
		
		if ($sTeam != "All") {
			if($sWhere){
				$sWhere .= " and ";
			} // End inner if
			$sWhere .= "team ='" . $sTeam . "'";
		}
		
		if($sPposition != "s") {
			switch ($sPposition) {
				case "s":
					if($sWhere){
						$sWhere .= " and ";
					} // End inner if
					$sWhere .= "pos != 'G'";
					break;
				case "f":
					if($sWhere){
						$sWhere .= " and ";
					} // End inner if
					$sWhere .= "pos in('L', 'C', 'R')";
					break;
				case "d":
					if($sWhere){
						$sWhere .= " and ";
					} // End inner if
					$sWhere .= "pos = 'D'";
					break;
				case "g":
					$sTable = $sGameType . $sSeason . "gstat";
					$sView = "gstat";
					break;
			} // End switch
		} // End if

		if($sPlayerStatus != "All") {
			if($sWhere){
				$sWhere .= " and ";
			} // End inner if
			$sWhere .= "rookie = 1";
		} // End if
		
		if(!$sWhere) {
			$sWhere = 1;
		} // End if

		$oPlayer = new $sTable;
	
		$aPlayerStats = $oPlayer->find($sWhere);

		echo $sWhere;
		
		include "../../views/$sView.php";

	} // End elseif

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