<?php
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
	
				$rk = 			strip_tags($aCells[0][0]);
				$player = 		strip_tags($aCells[0][1]);
				$team = 		strip_tags($aCells[0][2]);
				$pos = 			strip_tags($aCells[0][3]);
				$gp = 			strip_tags($aCells[0][4]);
				$g = 			strip_tags($aCells[0][5]);
				$a = 			strip_tags($aCells[0][6]);
				$pts = 			strip_tags($aCells[0][7]);
				$plusminus = 	strip_tags($aCells[0][8]);
				$pim = 			strip_tags($aCells[0][9]);
				$ppg = 			strip_tags($aCells[0][10]);
				$shg = 			strip_tags($aCells[0][11]);
				$gwg = 			strip_tags($aCells[0][12]);
				$otg = 			strip_tags($aCells[0][13]);
				$sog = 			strip_tags($aCells[0][14]);
				$pct = 			strip_tags($aCells[0][15]);
				$toiperg = 		strip_tags($aCells[0][16]);
				$sftperg = 		strip_tags($aCells[0][17]);
				$foper = 		strip_tags($aCells[0][18]);
	
				echo "RK: {$rk} | {$player} | Team: {$team} | GP: {$gp}  | G: {$g}  | A: {$a}  | Pts: {$pts}  | +/-: {$plusminus}  | PIM: {$pim} | PPG: {$ppg} | SHG: {$shg}  | GWG: {$gwg}  | OTG: {$otg} | SOG: {$sog}  | Pct: {$pct} | TOI/G: {$toiperg}  | Sft/G: {$sftperg} | FO%: {$foper} |\n";
			} // End if
		} // End foreach
	}; // End fgetRowsStatsSummary
	
	// ******************************************************
	// fgetRowsStatsSpecialTeams
	$fgetRowsStatsSpecialTeams = function($aRows){
		foreach ($aRows[0] as $aRow){
			if ((strpos($aRow,'<th')===false)){
				preg_match_all("|<td(.*)</td>|U", $aRow, $aCells);
			
				$rk = 			strip_tags($aCells[0][0]);
				$player = 		strip_tags($aCells[0][1]);
				$team = 		strip_tags($aCells[0][2]);
				$pos = 			strip_tags($aCells[0][3]);
				$gp = 			strip_tags($aCells[0][4]);
				$esg = 			strip_tags($aCells[0][5]);
				$esa = 			strip_tags($aCells[0][6]);
				$espts = 		strip_tags($aCells[0][7]);
				$ppg = 			strip_tags($aCells[0][8]);
				$ppa = 			strip_tags($aCells[0][9]);
				$ppp = 			strip_tags($aCells[0][10]);
				$shg = 			strip_tags($aCells[0][11]);
				$sha = 			strip_tags($aCells[0][12]);
				$shp = 			strip_tags($aCells[0][13]);
				$gwg = 			strip_tags($aCells[0][14]);
				$otg = 			strip_tags($aCells[0][15]);
					
				echo "RK: {$rk} | {$player} | Team: {$team} | Pos: {$pos}  | GP: {$gp}  | ESG: {$esg}  | ESA: {$esa}  | ESPts: {$espts}  | PPG: {$ppg}  | PPA: {$ppa} | PPP: {$ppp} | SHG: {$shg}  | SHA: {$sha}  | SHP: {$shp} | GWG: {$gwg}  | OTG: {$otg} |\n";
				} // End if
		} // End foreach
	}; // End fgetRowsStatsSpecialTeams

	// ******************************************************
	// fgetRowsStatsTOI
	$fgetRowsStatsTOI = function($aRows){
		foreach ($aRows[0] as $aRow){
			if ((strpos($aRow,'<th')===false)){
				preg_match_all("|<td(.*)</td>|U",$aRow,$aCells);
	
				$rk = 			strip_tags($aCells[0][0]);
				$player = 		strip_tags($aCells[0][1]);
				$team = 		strip_tags($aCells[0][2]);
				$pos = 			strip_tags($aCells[0][3]);
				$gp = 			strip_tags($aCells[0][4]);
				$estoi = 		strip_tags($aCells[0][5]);
				$estoiperg = 	strip_tags($aCells[0][6]);
				$shtoi = 		strip_tags($aCells[0][7]);
				$shtoiperg = 	strip_tags($aCells[0][8]);
				$pptoi = 		strip_tags($aCells[0][9]);
				$pptoiperg = 	strip_tags($aCells[0][10]);
				$toi = 			strip_tags($aCells[0][11]);
				$toiperg = 		strip_tags($aCells[0][12]);
				$shfts = 		strip_tags($aCells[0][13]);
				$toipershft = 	strip_tags($aCells[0][14]);
				$shftperg = 	strip_tags($aCells[0][15]);
	
				echo "RK: {$rk} | {$player} | Team: {$team} | Pos: {$pos} | GP: {$gp}  |ESTOI: {$estoi}  | ESTOI/G: {$estoiperg}  | SHTOI: {$shtoi}  | SHTOI/G: {$shtoiperg} | PPTOI: {$pptoi} | PPTOI/G: {$pptoiperg} | TO{$toi}  | TOI/G: {$toiperg} | SHIFTS: {$shfts} | TOI/SHIFT: {$toipershft} | Shifts/G {$shftperg}|\n";
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