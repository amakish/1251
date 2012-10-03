<?php
	/*
	| Active Record
	|*******************************************************/
	require_once('../../adodb5/adodb.inc.php');
	require_once('../../adodb5/adodb-active-record.inc.php');
	$db = NewADOConnection('mysql');
	if($_SERVER['SERVER_NAME'] == 'localhost'){
		$db->Connect("localhost", "root", "", "nhl");
	}
	else{
		$db->Connect('amakish.netfirmsmysql.com', 'amakish', '1gdsac5t7*krs2', "nhl");
	}	
	ADOdb_Active_Record::SetDatabaseAdapter($db);
	/*
	| Classes
	|*******************************************************/
	class post201011gstat extends ADOdb_Active_Record{}
	class post201011sstat extends ADOdb_Active_Record{}
	class post201112gstat extends ADOdb_Active_Record{}
	class post201112sstat extends ADOdb_Active_Record{}
	
	class reg201011gstat extends ADOdb_Active_Record{}	
	class reg201011sstat extends ADOdb_Active_Record{}
	class reg201112gstat extends ADOdb_Active_Record{}	
	class reg201112sstat extends ADOdb_Active_Record{}
	class reg201213sstat extends ADOdb_Active_Record{}
	
	class post201011tschedule extends ADOdb_Active_Record{}
	class post201112tschedule extends ADOdb_Active_Record{}
	class post201213tschedule extends ADOdb_Active_Record{}
	
	class reg201011tschedule extends ADOdb_Active_Record{}
	class reg201112tschedule extends ADOdb_Active_Record{}
	class reg201213tschedule extends ADOdb_Active_Record{}
	/*
	| Template Code Structure
	|_______________________________________________________
	
	$sWhere = $_SESSION('where');
	$sTable = $_SESSION('table');
	$sOrder = $_SESSION('order');
	
	if() {
		$sWhere = ;
		$sTable = ;
		$sOrder = ;
	}	
	elseif() {
		$sWhere = ;
		$sTable = ;
		$sOrder = ;
	}
	else() {
		$sWhere = ;
		$sTable = ;
		$sOrder = ;
	}
	
	$sPagination .= " Limit $iPageNumber * $iPerPage, $iPageNum";
	
	$oData = new $sTable;
	$aData = $oData->find($sWhere . $sOrder . $sPagination);
	
	if() {
		include "../../views/$sView1.php";
	}	
	elseif() {
		include "../../views/$sView2.php";
	}
	else() {
		include "../../views/$sView3.php";
	}
	*/
	/*
	| Session Control
	|_________________________________________________________________________*/
	session_start();
	
	$sWhere = $_SESSION('where');
	$sTable = $_SESSION('table');
	$sOrder = $_SESSION('order');
	
	/*
	| POST/GET Array Control
	|_________________________________________________________________________*/
	$action = (array_key_exists('action', $_POST)?$_POST['action']: '');
	$action = (array_key_exists('action', $_GET)?$_GET['action']: $action);
	
	$sGameType		= ($_POST['gameType']);
	$sSeason		= ($_POST['season']);
	$sTeam			= ($_POST['team']);
	$sStatView		= (array_key_exists('statView', $_POST)?$_POST['statView']: 'tschedule');
	$sPposition		= (array_key_exists('position', $_POST)?$_POST['position']: '');
	$sPlayerStatus	= (array_key_exists('playerStatus', $_POST)?$_POST['playerStatus']: 'All');

	/*CASE 1*/
	if($action == 'Search') {
		/*
		| $sWhere
		|_________________________________________________________________________*/
		$sWhere = "";
		$sView  = $sStatView;
		
		if ($sTeam != "All") {
			if($sWhere){
				$sWhere .= " and ";
			}
			if($sStatView == 'tschedule') {
				$sWhere .= "hteam ='" . $sTeam . "' || vteam ='" . $sTeam . "'";
			}
			else {
				$sWhere .= "team ='" . $sTeam . "'";
			}
		} // End if
		
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
		
		/*
		| $sTable
		|_________________________________________________________________________*/

		$sTable = $sGameType . $sSeason . $sPosition;
		
		/*
		| $sOrder
		|_________________________________________________________________________*/

		$sOrder = "1 order by pts desc";
		
	}
	
	/*CASE 2*/
	elseif($action == '') {
		/*
		| $sWhere
		|_________________________________________________________________________*/
	
	
		$sWhere = ;
	
		/*
		| $sTable
		|_________________________________________________________________________*/
	
	
		$sTable = ;
	
		/*
		| $sOrder
		|_________________________________________________________________________*/
	
	
		$sOrder = ;
	
	}
	
	/*CASE 3*/
	else {
		/*
		| $sWhere
		|_________________________________________________________________________*/
	
	
		$sWhere = ;
	
		/*
		| $sTable
		|_________________________________________________________________________*/
	
	
		$sTable = ;
	
		/*
		| $sOrder
		|_________________________________________________________________________*/
	
	
		$sOrder = ;
	
	}
?>
	