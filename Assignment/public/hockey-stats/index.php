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
	 | $_POST / $_GET Array Control
	|_________________________________________________________________________*/
	$action = (array_key_exists('action', $_POST)?$_POST['action']: '');
	$action = (array_key_exists('action', $_GET)?$_GET['action']: $action);
	
	/*
	| $_SESSION Control
	|_________________________________________________________________________*/
	session_start();

	if (!isset($_SESSION['where'])) {
		$_SESSION['where'] = "";
	}
	if (!isset($_SESSION['table'])) {
		$_SESSION['table'] = "reg201112sstat";
	}
	if (!isset($_SESSION['order'])) {
		$_SESSION['order'] = " order by pts desc";
	}
	if (!isset($_SESSION['view'])) {
		$_SESSION['view'] = "sstatscoring";
	}
	
	if (!isset($_SESSION['season'])) {
		$_SESSION['season'] = "201112";
	}
	if (!isset($_SESSION['gameType'])) {
		$_SESSION['gameType'] = "reg";
	}
	if (!isset($_SESSION['statView'])) {
		$_SESSION['statView'] = "sstatscoring";
	}
	if (!isset($_SESSION['team'])) {
		$_SESSION['team'] = "All";
	}
	if (!isset($_SESSION['position'])) {
		$_SESSION['position'] = "s";
	}
	if (!isset($_SESSION['playerStatus'])) {
		$_SESSION['playerStatus'] = "All";
	}
	
	
	$sWhere 	= $_SESSION['where'];
	$sTable 	= $_SESSION['table'];
	$sOrder 	= $_SESSION['order'];
	$sView	 	= $_SESSION['view'];
	
	$sSeason 		= $_SESSION['season'];
	$sGameType		= $_SESSION['gameType'];
	$sTeam			= $_SESSION['team'];
	$sStatView      = $_SESSION['statView'];
	$sPposition		= $_SESSION['position'];
	$sPlayerStatus	= $_SESSION['playerStatus'];
	
	
	if($action == 'Search') {
	
		$sSeason		= ($_POST['season']);
		$sGameType		= ($_POST['gameType']);
		$sTeam			= ($_POST['team']);
		$sPposition		= (array_key_exists('position', $_POST)?$_POST['position']: '');
		$sStatView		= (array_key_exists('statView', $_POST)?$_POST['statView']: 'tschedule');
		$sPlayerStatus	= (array_key_exists('playerStatus', $_POST)?$_POST['playerStatus']: 'All');
		
		//print_r($_POST);
		
		if($sPposition == "g") {
			$sPosition = "gstat";
		}
		elseif($sPposition == "") {
			$sPosition = "tschedule";
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
			if($sStatView == 'tschedule') {
				$sWhere .= "hteam ='" . $sTeam . "' || vteam ='" . $sTeam . "'";
			}
			else {
				$sWhere .= "team ='" . $sTeam . "'";
			}
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
		
		switch ($sView) {
			case "gstat":
				$sOrder = " order by w desc";
				break;
			case "sstatscoring":
				$sOrder = " order by pts desc";
				break;
			case "sstaticetime":
				$sOrder = " order by pppts desc";
				break;
			case "tschedule":
				$sOrder = " order by id";
				break;
		} // End switch
		
		if($sPlayerStatus != "All") {
			if($sWhere){
				$sWhere .= " and ";
			} // End inner if
			$sWhere .= "rookie = 1";
		} // End if
		
		if(!$sWhere) {
			$sWhere = 1;
		} // End if

		$_SESSION['view'] 		= $sView;
		$_SESSION['table'] 		= $sTable;
		$_SESSION['where'] 		= $sWhere;
		$_SESSION['order'] 		= $sOrder;
		
		$_SESSION['season'] 		= $sSeason;
		$_SESSION['gameType'] 		= $sGameType;
		$_SESSION['statview']		= $sStatView;
		$_SESSION['team'] 			= $sTeam;
		$_SESSION['position'] 		= $sPposition;
		$_SESSION['playerStatus'] 	= $sPlayerStatus;
		
		$_SESSION['pagenum'] = 0;
		
	} // End if /* ($action == 'Search')*/
	
	switch ($action) {
		case "Name":
			$sOrder = " order by name";
			$_SESSION['pagenum'] = 0;
			break;
		case "Age":
			$sOrder = " order by age";
			$_SESSION['pagenum'] = 0;
			break;
	} // End switch
	
	
	/*
	| Pagination ControL
	|_________________________________________________________________________*/	

	$iPerPage = 20;
	$iPageNum = $_SESSION['pagenum'];
	
	if($action == 'Next') {
		$iPageNum++;
		$_SESSION['pagenum'] = $iPageNum;
	}
	elseif($action == 'Previous' && $iPageNum > 0) {
		$iPageNum--;
		$_SESSION['pagenum'] = $iPageNum;
	}
	
	print_r ("action" . $action);
	print_r ("PageNum" . $iPageNum);
	print_r($_SESSION);
	
	$iStartPage = 0;
	
	if($action == 'All') {
		$sPagination ="";
	}
	else {
		$iStartPage = $iPageNum * $iPerPage;
		$sPagination = " Limit $iStartPage , $iPerPage";
	}
	$iStartPage++;
	/*
	| Data ControL
	|_________________________________________________________________________*/	
	$oData = new $sTable;
	
	$sSql = $sWhere . $sOrder . $sPagination;
	$aData = $oData->find($sSql);
	
	
	if(!$aData){
		echo $db->errormsg()." ".$sSql;
	} //db error messages
	

	/*
	| View ControL
	|_________________________________________________________________________*/
	


	/*
	| Data Scrape ControL
	|_________________________________________________________________________*/
	if($action == 'scrape1'){
		include '../../model/post201112dataSktrStats.php';
	} // End if
	elseif($action == 'scrape2'){
		include '../../model/post201112dataGoalieStats.php';
	} // End if
	else {
		include "../../views/$sView.php";
	}
?>
	