<?php

	// ******************************************************
	// Active Record
	// ******************************************************
	require_once '../../ActiveRecord/ActiveRecord.php';

	ActiveRecord\Config::initialize(function($cfg)
	{
		$cfg->set_model_directory('.');
		$cfg->set_connections(
			array(
				'development' => 'mysql://root:@localhost/nhl',
				'test' => 'mysql://username:password@localhost/test_database_name',
				'production' => 'mysql://username:password@localhost/production_database_name'
			)
		);
	});

	// ******************************************************
	// Functions
	// ******************************************************
	
	// ******************************************************
	// CURL
	// Function: 	Run CURL
	// Description: Executes a CURL request
	// Parameters:  url (string) - URL to make request to
	//              method (string) - HTTP transfer method
	//              headers - HTTP transfer headers
	//              postvals - post values
	// ******************************************************
	function run_curl($url, $method = 'GET', $postvals = null){
		$ch = curl_init($url);
	
		//GET request: send headers and return data transfer
		if ($method == 'GET'){
			$options = array(
					CURLOPT_URL => $url,
					CURLOPT_RETURNTRANSFER => 1,
					CURLOPT_SSL_VERIFYPEER => false
			);
			curl_setopt_array($ch, $options);
			//POST / PUT request: send post object and return data transfer
		} else {
			$options = array(
					CURLOPT_URL => $url,
					CURLOPT_POST => 1,
					CURLOPT_POSTFIELDS => http_build_query($postvals),
					CURLOPT_RETURNTRANSFER => 1,
					CURLOPT_SSL_VERIFYPEER => false
			);
			curl_setopt_array($ch, $options);
		}
		if( ! $response = curl_exec($ch))
		{
			trigger_error(curl_error($ch));
		}
		curl_close($ch);
	
		return $response;
	} // End run_curl
	
	// ******************************************************
	// getSktrStats
	// ******************************************************
	function getSktrStats($sUrl, $fgetRows) {
		// get file contents
		$sUrlInternal = $sUrl;
		$sNewLines = array("\t", "\n", "\r", "\x20\x20", "\0", "\x0B", "NHL Winter Classic ");
		$sRawContent = run_curl($sUrlInternal);		
		$sContent = str_replace($sNewLines, "", html_entity_decode($sRawContent));
	
		// isolate the tbody
		$sTbodyStart = strpos($sContent,'<tbody');
		$sTBodyEnd = strpos($sContent,'</tbody>',$sTbodyStart) + 7;
		$sTBody = substr($sContent, $sTbodyStart, $sTBodyEnd - $sTbodyStart);
	
		// isolate the rows within the tbody
		preg_match_all("|<tr(.*)</tr>|U", $sTBody, $aRows);
		$fgetRows($aRows);
	
		return $sContent;
	} // End getSktrStats
	
	// ******************************************************
	// getPlyrNumXXofYYY		(ie 1-XX of YYY results.)
	// ******************************************************
	function getPlyrNumXXofYYY($sContent) {
		$sPlyrNumDivStart = strpos($sContent, '<div class="numRes"') + 20;
		$sPlyrNumDivEnd = strpos($sContent, '</div>', $sPlyrNumDivStart);
		$sPlyrNumDiv = substr($sContent,$sPlyrNumDivStart, $sPlyrNumDivEnd - $sPlyrNumDivStart);
	
		$aTempString1 = explode("-", $sPlyrNumDiv);
		$aTempString2 = $aTempString1[1];
		$aPlyrNum = explode(" ", $aTempString2);
	
		return $aPlyrNum;
	} // End getPlyrNumXXofYYY
	
	// ******************************************************
	// Anonymous Functions (Callback)
	// ******************************************************
	// fgetRowsStatsSummary
	// ******************************************************
	$fgetRowsStatsSummary = function($aRows){
		foreach ($aRows[0] as $aRow){
			if ((strpos($aRow,'<th')===false)){
				preg_match_all("|<td(.*)</td>|U", $aRow, $aCells);
				
				// get name and team
				$sName = 				strip_tags($aCells[0][1]);
				$sTeam = 				strip_tags($aCells[0][2]);
				$sTeamFirst = 			substr($sTeam, 0, 3);
				$sTeamCurrent = 		substr($sTeam, -3);
				
				// use name and first team to verify whether player already exists in db
				$oSktrStat = SktrStat::find('first', array('conditions' => array('name = ? AND SUBSTRING(team, 1, 3) = ?', $sName, $sTeamFirst)));
				
				// if player exists then update stats, if player doesn't exist then create player and insert stats
				if(!$oSktrStat){
					$oSktrStat = new SktrStat;
				} // End if
				
				// update/insert stats
				$oSktrStat->rk  = 		strip_tags($aCells[0][0]);
				$oSktrStat->name = 		$sName;
				$oSktrStat->team = 		$sTeam;
				$oSktrStat->teamcur = 	$sTeamCurrent;
				$oSktrStat->pos = 		strip_tags($aCells[0][3]);
				$oSktrStat->gp = 		strip_tags($aCells[0][4]);
				$oSktrStat->g = 		strip_tags($aCells[0][5]);
				$oSktrStat->a = 		strip_tags($aCells[0][6]);
				$oSktrStat->pts = 		strip_tags($aCells[0][7]);
				$oSktrStat->plusminus = strip_tags($aCells[0][8]);
				$oSktrStat->pim = 		strip_tags($aCells[0][9]);
				$oSktrStat->ppg = 		strip_tags($aCells[0][10]);
				$oSktrStat->shg = 		strip_tags($aCells[0][11]);
				$oSktrStat->gwg = 		strip_tags($aCells[0][12]);
				$oSktrStat->otg = 		strip_tags($aCells[0][13]);
				$oSktrStat->sog = 		strip_tags($aCells[0][14]);
				$oSktrStat->shtpct = 	strip_tags($aCells[0][15]);
				$oSktrStat->toiperg = 	strip_tags($aCells[0][16]);
				$oSktrStat->shftperg = 	strip_tags($aCells[0][17]);
				$oSktrStat->fopct = 	strip_tags($aCells[0][18]);

				/*
				$rk = 			$oSktrStat->rk;
				$name = 		$oSktrStat->name;
				$teamcur = 		$oSktrStat->teamcur;
				$pos = 			$oSktrStat->pos;
				$gp = 			$oSktrStat->gp;
				$g =	 		$oSktrStat->g;
				$a = 			$oSktrStat->a;
				$pts =	 		$oSktrStat->pts;
				$plusminus = 	$oSktrStat->plusminus;
				$pim = 			$oSktrStat->pim;
				$ppg = 			$oSktrStat->ppg;
				$shg = 			$oSktrStat->shg;
				$gwg = 			$oSktrStat->gwg;
				$otg = 			$oSktrStat->otg;
				$sog = 			$oSktrStat->sog;
				$shtpct = 		$oSktrStat->shtpct;
				$toiperg = 		$oSktrStat->toiperg;
				$shftperg = 	$oSktrStat->shftperg;
				$fopct = 		$oSktrStat->fopct;
				
				echo "RK: {$rk} | {$name} | Team: {$teamcur} | POS: {$pos} | GP: {$gp}  | G: {$g}  | A: {$a}  | Pts: {$pts}  | +/-: {$plusminus}  | PIM: {$pim} | PPG: {$ppg} | SHG: {$shg}  | GWG: {$gwg}  | OTG: {$otg} | SOG: {$sog}  | Pct: {$shtpct} | TOI/G: {$toiperg}  | Sft/G: {$shftperg} | FO%: {$fopct} |\n";
				*/
				
				$oSktrStat->save();

			} // End if
		} // End foreach
	}; // End fgetRowsStatsSummary
	
	// ******************************************************
	// fgetRowsStatsBio
	// ******************************************************
	$fgetRowsStatsBio = function($aRows){
		foreach ($aRows[0] as $aRow){
			if ((strpos($aRow,'<th')===false)){
				preg_match_all("|<td(.*)</td>|U", $aRow, $aCells);
				
				// get name and team
				$sName = 				strip_tags($aCells[0][1]);
				$sTeam = 				strip_tags($aCells[0][2]);
				$sTeamFirst = 			substr($sTeam, 0, 3);
				$sTeamCurrent = 		substr($sTeam, -3);
				// get dob
				$sDob =	strip_tags($aCells[0][4]);
				$sDobFormat = str_replace("'","", $sDob);
				$tsDob = strtotime(str_replace(" ","-", $sDobFormat));
				$dDob = date("Y-m-d", $tsDob);
				// calculate age
				$dAge = number_format(((time() - $tsDob) / 31556926), 1);
				
				// use name and first team to verify whether player already exists in db
				$oSktrStat = SktrStat::find('first', array('conditions' => array('name = ? AND SUBSTRING(team, 1, 3) = ?', $sName, $sTeamFirst)));
				
				// if player exists then update stats, if player doesn't exist then create player and insert stats
				if(!$oSktrStat){
					$oSktrStat = new SktrStat;
				} // End if
				
				// update/insert stats
				$oSktrStat->dob = 		$dDob;
				$oSktrStat->age = 		$dAge;
				
				/*
				$name = 		$oSktrStat->name;
				$teamcur = 		$oSktrStat->teamcur;
				$dob = 			$oSktrStat->dob;
	
				echo "{$name} | Team: {$teamcur} | Age: {$dAge} |\n";
				*/
	
				$oSktrStat->save();
	
			} // End if
		} // End foreach
	}; // End fgetRowsStatsBio
	
	// ******************************************************
	// fgetRowsStatsSpecialTeams
	// ******************************************************
	$fgetRowsStatsSpecialTeams = function($aRows){
		foreach ($aRows[0] as $aRow){
			if ((strpos($aRow,'<th')===false)){
				preg_match_all("|<td(.*)</td>|U", $aRow, $aCells);
				
				// get name and team
				$name = 				strip_tags($aCells[0][1]);
				$team = 				strip_tags($aCells[0][2]);
				$sTeamFirst = 			substr($team, 0, 3);
				$sTeamCurrent = 		substr($team, -3);
				
				// use name and first team to verify whether player already exists in db
				$oSktrStat = SktrStat::find('first', array('conditions' => array('name = ? AND SUBSTRING(team, 1, 3) = ?', $name, $sTeamFirst)));
				
				// if player exists then update stats, if player doesn't exist then create player and insert stats
				if(!$oSktrStat){
					$oSktrStat = new SktrStat;
				} // End if
				
				// update/insert stats
				$oSktrStat->esg = 		strip_tags($aCells[0][5]);
				$oSktrStat->esa = 		strip_tags($aCells[0][6]);
				$oSktrStat->espts = 	strip_tags($aCells[0][7]);
				$oSktrStat->ppa = 		strip_tags($aCells[0][9]);
				$oSktrStat->pppts = 	strip_tags($aCells[0][10]);
				$oSktrStat->sha = 		strip_tags($aCells[0][12]);
				$oSktrStat->shpts =		strip_tags($aCells[0][13]);
				
				/*
				$name = 	$oSktrStat->name;
				$team = 	$oSktrStat->team;
				$teamcur = 	$oSktrStat->teamcur;
				$esg = 		$oSktrStat->esg;
				$esa = 		$oSktrStat->esa;
				$espts = 	$oSktrStat->espts;
				$ppa = 		$oSktrStat->ppa;
				$pppts = 	$oSktrStat->pppts;
				$sha = 		$oSktrStat->sha;
				$shpts = 	$oSktrStat->shpts;
				
				echo "{$name} | Team: {$teamcur} | ESG: {$esg} | ESA: {$esa} | ESPts: {$espts} | PPA: {$ppa} | PPP: {$pppts} | SHA: {$sha} | SHP: {$shpts} |\n";
				*/
				
				$oSktrStat->save();
			
			} // End if
		} // End foreach
	}; // End fgetRowsStatsSpecialTeams

	// ******************************************************
	// fgetRowsStatsTOI
	// ******************************************************
	$fgetRowsStatsTOI = function($aRows){
		foreach ($aRows[0] as $aRow){
			if ((strpos($aRow,'<th')===false)){
				preg_match_all("|<td(.*)</td>|U",$aRow,$aCells);
				
				// get name and team
				$name = 					strip_tags($aCells[0][1]);
				$team = 					strip_tags($aCells[0][2]);
				$sTeamFirst = 				substr($team, 0, 3);
				$sTeamCurrent = 			substr($team, -3);
				
				// use name and first team to verify whether player already exists in db
				$oSktrStat = SktrStat::find('first', array('conditions' => array('name = ? AND SUBSTRING(team, 1, 3) = ?', $name, $sTeamFirst)));
				
				// if player exists then update stats, if player doesn't exist then create player and insert stats
				if(!$oSktrStat){
					$oSktrStat = new SktrStat;
				} // End if
				
				// update/insert stats
				$oSktrStat->estoi = 		strip_tags($aCells[0][5]);
				$oSktrStat->estoiperg = 	strip_tags($aCells[0][6]);
				$oSktrStat->shtoi = 		strip_tags($aCells[0][7]);
				$oSktrStat->shtoiperg = 	strip_tags($aCells[0][8]);
				$oSktrStat->pptoi = 		strip_tags($aCells[0][9]);
				$oSktrStat->pptoiperg = 	strip_tags($aCells[0][10]);
				$oSktrStat->toi = 			strip_tags($aCells[0][11]);
				$oSktrStat->toiperg = 		strip_tags($aCells[0][12]);
				$oSktrStat->shft = 			strip_tags($aCells[0][13]);
				$oSktrStat->toipershft = 	strip_tags($aCells[0][14]);
				$oSktrStat->shftperg = 		strip_tags($aCells[0][15]);
				
				/*
				$name = 		$oSktrStat->name;
				$team = 		$oSktrStat->team;
				$teamcur = 		$oSktrStat->teamcur;
				$estoi = 		$oSktrStat->estoi;
				$estoiperg = 	$oSktrStat->estoiperg;
				$shtoi = 		$oSktrStat->shtoi;
				$shtoiperg = 	$oSktrStat->shtoiperg;
				$pptoi = 		$oSktrStat->pptoi;
				$pptoiperg = 	$oSktrStat->pptoiperg;
				$toi = 			$oSktrStat->toi;
				$toiperg = 		$oSktrStat->toiperg;
				$shft = 		$oSktrStat->shft;
				$toipershft = 	$oSktrStat->toipershft;
				$shftperg = 	$oSktrStat->shftperg;
				
				echo "{$name} | Team: {$teamcur} | ESTOI: {$estoi} | ESTOI/G: {$estoiperg} | SHTOI: {$shtoi} | SHTOI/G: {$shtoiperg} | PPTOI: {$pptoi} | PPTOI/G: $pptoiperg} | TOI: {$toi} | TOI/G: {$toiperg} | SHIFTS: {$shft} | TOI/SHIFT: {$toipershft} | Shifts/G: {$shftperg}|\n";
				*/

				$oSktrStat->save();
				
			} // End if
		} // End foreach
	}; // End fgetRowsStatsTOI

	// ******************************************************
	// Logic
	// ******************************************************
	// Stats - Summary
	// ******************************************************
	$sPlyrNumXXOf = "junk";
	$sPlyrNumOfYYY = "";

	for($i=1; $sPlyrNumXXOf != $sPlyrNumOfYYY; $i++) {
		$sStatsSummary = getSktrStats("http://www.nhl.com/ice/playerstats.htm?fetchKey=20122ALLSASALL&viewName=summary&sort=points&pg=$i", $fgetRowsStatsSummary);
		$aPlyrNum = getPlyrNumXXofYYY($sStatsSummary);
	
		$sPlyrNumXXOf = $aPlyrNum[0];
		$sPlyrNumOfYYY = $aPlyrNum[2];
	} // End for loop
	
	// ******************************************************
	// Stats -  Bio
	// ******************************************************
	$sPlyrNumXXOf = "junk";
	$sPlyrNumOfYYY = "";
	
	for($i=1; $sPlyrNumXXOf != $sPlyrNumOfYYY; $i++) {
		$sStatsBio = getSktrStats("http://www.nhl.com/ice/playerstats.htm?fetchKey=20122ALLSASALL&viewName=bios&sort=player.birthCountryAbbrev&pg=$i", $fgetRowsStatsBio);
		$aPlyrNum = getPlyrNumXXofYYY($sStatsBio);
	
		$sPlyrNumXXOf = $aPlyrNum[0];
		$sPlyrNumOfYYY = $aPlyrNum[2];
	} // End for loop
	
	
	// ******************************************************
	// Stats - Special Teams
	// ******************************************************
	$sPlyrNumXXOf = "junk";
	$sPlyrNumOfYYY = "";

	for($i=1; $sPlyrNumXXOf != $sPlyrNumOfYYY; $i++) {
		$sStatsSpecialTeams = getSktrStats("http://www.nhl.com/ice/playerstats.htm?fetchKey=20122ALLSASALL&viewName=scoringLeaders&sort=powerPlayGoals&pg=$i", $fgetRowsStatsSpecialTeams);
		$aPlyrNum = getPlyrNumXXofYYY($sStatsSpecialTeams);
	
		$sPlyrNumXXOf = $aPlyrNum[0];
		$sPlyrNumOfYYY = $aPlyrNum[2];
	} // End for loop

	// ******************************************************
	// Stats -  Time On Ice
	// ******************************************************
	$sPlyrNumXXOf = "junk";
	$sPlyrNumOfYYY = "";

	for($i=1; $sPlyrNumXXOf != $sPlyrNumOfYYY; $i++) {
		$sStatsTOI = getSktrStats("http://www.nhl.com/ice/playerstats.htm?fetchKey=20122ALLSASALL&viewName=timeOnIce&sort=timeOnIce&pg=$i", $fgetRowsStatsTOI);
		$aPlyrNum = getPlyrNumXXofYYY($sStatsTOI);
	
		$sPlyrNumXXOf = $aPlyrNum[0];
		$sPlyrNumOfYYY = $aPlyrNum[2];
	} // End for loop
?>