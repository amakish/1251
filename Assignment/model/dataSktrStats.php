<?php
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
	// getSktrStats
	function getSktrStats($sUrl, $fgetRows) {
		// get file contents
		$sUrlInternal = $sUrl;
		$sNewLines = array("\t", "\n", "\r", "\x20\x20", "\0", "\x0B", "NHL Winter Classic ");
		$sRawContent = file_get_contents($sUrlInternal);
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
	// Anonymous Function (Callback)
	// ******************************************************
	// fgetRowsStatsSummary
	$fgetRowsStatsSummary = function($aRows){
		foreach ($aRows[0] as $aRow){
			if ((strpos($aRow,'<th')===false)){
				preg_match_all("|<td(.*)</td>|U", $aRow, $aCells);
				
				$player = 	strip_tags($aCells[0][1]);
				$team = 	strip_tags($aCells[0][2]);
				
				$oSktrStat = SktrStat::find('first', array('conditions' => array('player = ? AND team = ?', $player, $team)));
				
				if(!$oSktrStat){
					$oSktrStat = new SktrStat;
				} // End if
				
				$oSktrStat->rk  = 		strip_tags($aCells[0][0]);
				$oSktrStat->player = 	$player;
				$oSktrStat->team = 		$team;
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
	
				// echo "RK: {rk} | {player} | Team: {team} | POS: {pos} | GP: {gp}  | G: {g}  | A: {a}  | Pts: {pts}  | +/-: {plusminus}  | PIM: {pim} | PPG: {ppg} | SHG: {shg}  | GWG: {gwg}  | OTG: {otg} | SOG: {sog}  | Pct: {shtpct} | TOI/G: {toiperg}  | Sft/G: {shftperg} | FO%: {fopct} |\n";

				$oSktrStat->save();

			} // End if
		} // End foreach
	}; // End fgetRowsStatsSummary
	
	// ******************************************************
	// fgetRowsStatsSpecialTeams
	$fgetRowsStatsSpecialTeams = function($aRows){
		foreach ($aRows[0] as $aRow){
			if ((strpos($aRow,'<th')===false)){
				preg_match_all("|<td(.*)</td>|U", $aRow, $aCells);
				
				$player = 	strip_tags($aCells[0][1]);
				$team = 	strip_tags($aCells[0][2]);
				
				$oSktrStat = SktrStat::find('first', array('conditions' => array('player = ? AND team = ?', $player, $team)));
				
				if(!$oSktrStat){
					$oSktrStat = new SktrStat;
				} // End if
				
				$oSktrStat->esg = 		strip_tags($aCells[0][5]);
				$oSktrStat->esa = 		strip_tags($aCells[0][6]);
				$oSktrStat->espts = 	strip_tags($aCells[0][7]);
				$oSktrStat->ppa = 		strip_tags($aCells[0][9]);
				$oSktrStat->pppts = 	strip_tags($aCells[0][10]);
				$oSktrStat->sha = 		strip_tags($aCells[0][12]);
				$oSktrStat->shpts =		strip_tags($aCells[0][13]);
					
				// echo "ESG: {esg} | ESA: {esa} | ESPts: {espts} | PPA: {ppa} | PPP: {ppts} | SHA: {sha} | SHP: {$shpts} |\n";
				
				$oSktrStat->save();
			
			} // End if
		} // End foreach
	}; // End fgetRowsStatsSpecialTeams

	// ******************************************************
	// fgetRowsStatsTOI
	$fgetRowsStatsTOI = function($aRows){
		foreach ($aRows[0] as $aRow){
			if ((strpos($aRow,'<th')===false)){
				preg_match_all("|<td(.*)</td>|U",$aRow,$aCells);
				
				$player = 	strip_tags($aCells[0][1]);
				$team = 	strip_tags($aCells[0][2]);
				
				$oSktrStat = SktrStat::find('first', array('conditions' => array('player = ? AND team = ?', $player, $team)));
				
				if(!$oSktrStat){
					$oSktrStat = new SktrStat;
				} // End if
				
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
	
				// echo "ESTOI: {estoi} | ESTOI/G: {estoiperg} | SHTOI: {shtoi} | SHTOI/G: {shtoiperg} | PPTOI: {pptoi} | PPTOI/G: $pptoiperg} | TO{toi} | TOI/G: {toiperg} | SHIFTS: {shft} | TOI/SHIFT: {toipershft} | Shifts/G {shftperg}|\n";
			
				$oSktrStat->save();
				
			} // End if
		} // End foreach
	}; // End fgetRowsStatsTOI

	// ******************************************************
	// Logic
	// Stats - Summary
	$sPlyrNumXXOf = "junk";
	$sPlyrNumOfYYY = "";

	for($i=1; $sPlyrNumXXOf != $sPlyrNumOfYYY; $i++) {
		$sStatsSummary = getSktrStats("http://www.nhl.com/ice/playerstats.htm?fetchKey=20122ALLSASALL&viewName=summary&sort=points&pg=$i", $fgetRowsStatsSummary);
		$aPlyrNum = getPlyrNumXXofYYY($sStatsSummary);
	
		$sPlyrNumXXOf = $aPlyrNum[0];
		$sPlyrNumOfYYY = $aPlyrNum[2];
	} // End for loop

	// ******************************************************
	// Stats - Special Teams
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
	$sPlyrNumXXOf = "junk";
	$sPlyrNumOfYYY = "";

	for($i=1; $sPlyrNumXXOf != $sPlyrNumOfYYY; $i++) {
		$sStatsTOI = getSktrStats("http://www.nhl.com/ice/playerstats.htm?fetchKey=20122ALLSASALL&viewName=timeOnIce&sort=timeOnIce&pg=$i", $fgetRowsStatsTOI);
		$aPlyrNum = getPlyrNumXXofYYY($sStatsTOI);
	
		$sPlyrNumXXOf = $aPlyrNum[0];
		$sPlyrNumOfYYY = $aPlyrNum[2];
	} // End for loop
?>