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
		$db->Connect('amakish.netfirmsmysql.com', 'amakish', 'password', "nhl");
		/* password? ('1gdsac5t7*krs2') */
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
	| $_POST / $_GET / $_SESSION Control
	|_________________________________________________________________________*/
	$action = (array_key_exists('action', $_POST)?$_POST['action']: '');
	$action = (array_key_exists('action', $_GET)?$_GET['action']: $action);

	session_start();

	if (!isset($_SESSION['where'])) {
		$_SESSION['where'] = "1";
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
	
	/*
	| String Building
	|_________________________________________________________________________*/
	if($action == 'Search') {
	
		$sSeason		= (array_key_exists('season', $_POST)?$_POST['season']: '20112');
		$sGameType		= (array_key_exists('gameType', $_POST)?$_POST['gameType']: 'reg');
		$sTeam			= (array_key_exists('team', $_POST)?$_POST['team']: 'All');
		$sPposition		= (array_key_exists('position', $_POST)?$_POST['position']: '');
		$sStatView		= (array_key_exists('statView', $_POST)?$_POST['statView']: 'sstat');
		$sPlayerStatus	= (array_key_exists('playerStatus', $_POST)?$_POST['playerStatus']: 'All');

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
			}
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
					}
					$sWhere .= "pos != 'G'";
					break;
				case "f":
					if($sWhere){
						$sWhere .= " and ";
					}
					$sWhere .= "pos in('L', 'C', 'R')";
					break;
				case "d":
					if($sWhere){
						$sWhere .= " and ";
					}
					$sWhere .= "pos = 'D'";
					break;
				case "g":
					$sTable = $sGameType . $sSeason . "gstat";
					$sView = "gstat";
					break;
			}
		}

		if($sPlayerStatus != "All") {
			if($sWhere){
				$sWhere .= " and ";
			}
			$sWhere .= "rookie = 1";
		}
		
		if(!$sWhere) {
			$sWhere = 1;
		}
		
		/*
		| Save Session
		|_________________________________________________________________________*/
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
	} // End if($action == 'Search')
		
	/*
	| Sorting Order Control
	|_________________________________________________________________________*/

	if($action == 'tSchedule') {
		$sView = 'tschedule';
	}
	if($action == 'pStats') {
		$sView = 'sstatscoring';
	}
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
	}


	print_r($sView);
	
	/*
	| Table Column Sorting
	|_________________________________________________________________________*/
	switch ($action) {
		case "Name":
			$sOrder = " order by name";
			$_SESSION['pagenum'] = 0;
			break;
		case "Age":
			$sOrder = " order by age";
			$_SESSION['pagenum'] = 0;
			break;
		case "Team":
			$sOrder = " order by team";
			$_SESSION['pagenum'] = 0;
			break;
		case "Pos":
			$sOrder = " order by pos";
			$_SESSION['pagenum'] = 0;
			break;
		case "GP":
			$sOrder = " order by gp desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "G":
			$sOrder = " order by g desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "A":
			$sOrder = " order by a desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "Pts":
			$sOrder = " order by pts desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "+/-":
			$sOrder = " order by plusminus desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "PIM":
			$sOrder = " order by pim desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "PPG":
			$sOrder = " order by ppg desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "SHG":
			$sOrder = " order by shg desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "GWG":
			$sOrder = " order by gwg desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "SOG":
			$sOrder = " order by sog desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "S%":
			$sOrder = " order by shtpct desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "TOI/G":
			$sOrder = " order by toiperg desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "PP TOI/G":
			$sOrder = " order by pptoiperg desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "SH TOI/G":
			$sOrder = " order by shtoiperg desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "ESG":
			$sOrder = " order by esg desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "ESA":
			$sOrder = " order by esa desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "ESPts":
			$sOrder = " order by espts desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "PPA":
			$sOrder = " order by ppa desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "PPG":
			$sOrder = " order by ppg desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "PPPts":
			$sOrder = " order by pppts desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "SHA":
			$sOrder = " order by sha desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "SHG":
			$sOrder = " order by shg desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "SHPts":
			$sOrder = " order by shpts desc";
			$_SESSION['pagenum'] = 0;
			break;
		case "ES TOI/G":
			$sOrder = " order by estoiperg desc";
			$_SESSION['pagenum'] = 0;
			break;
	}

	/*
	| Pagination ControL
	|_________________________________________________________________________*/	
	$_SESSION['pagenum'] = 0;
	
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
	
	echo $sSql;
	
	$aData = $oData->find($sSql);

	if(!$aData){
		echo $db->errormsg()." ".$sSql;
	} //db error messages

	/*
	| Includes
	|_________________________________________________________________________*/
	if($action == '' || $action == 'pStats'){
		include '../../views/sstatscoring.php';
	}
	elseif($action == 'scrape1'){
		include '../../model/post201112dataSktrStats.php';
	} // End if
	elseif($action == 'scrape2'){
		include '../../model/post201112dataGoalieStats.php';
	} // End if
	elseif($action == 'tSchedule'){
		include '../../views/tschedule.php';
	} // End elseif
	else {
		include "../../views/$sView.php";
	}
?>
	