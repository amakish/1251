<?php
	// ******************************************************
	// Functions

	// ******************************************************
	// getStatsSummary
	function getStatsSummary($sUrl, $fgetRows) {
		// get file contents
		$sUrlInternal = $sUrl;
		$sNewLines = array("\t","\n","\r","\x20\x20","\0","\x0B");
		$sRawContent = file_get_contents($sUrlInternal);
		$sContent = str_replace($sNewLines, "", html_entity_decode($sRawContent));

		// isolate the tbody
		$sTbodyStart = strpos($sContent,'<tbody');
		$sTBodyEnd = strpos($sContent,'</tbody>',$sTbodyStart) + 7;
		$sTBody = substr($sContent, $sTbodyStart, $sTBodyEnd - $sTbodyStart);
		
		// isolate the rows within the tbody
		preg_match_all("|<tr(.*)</tr>|U", $sTBody, $rows);
		$fgetRows($rows);

		return $sContent;
	} // End getStatsSummary
	
	// ******************************************************
	// getPlayerNumXXofYYY		(ie 1-XX of YYY results.)
	function getPlayerNumXXofYYY($sContent) {
		$sPlayerNumDivStart = strpos($sContent, '<div class="numRes"') + 20;
		$sPlayerNumDivEnd = strpos($sContent, '</div>', $sPlayerNumDivStart);
		$sPlayerNumDiv = substr($sContent,$sPlayerNumDivStart, $sPlayerNumDivEnd - $sPlayerNumDivStart);

		$aTempString1 = explode("-", $sPlayerNumDiv);
		$aTempString2 = $aTempString1[1];
		$aPlayerNum = explode(" ", $aTempString2);

		return $aPlayerNum;
	} // End getPlayerNumXXofYYY
	
	
	// ******************************************************
	// Anonymous Function (Callback)
	$getRows = function($aRows){
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
	}; // End getRows

	// ******************************************************
	// Logic
	$sPlayerNumXXOf = "junk";
	$sPlayerNumOfYYY = "";
	
	for($i=1; $sPlayerNumXXOf != $sPlayerNumOfYYY; $i++) {
		$sStatsSummary = getStatsSummary("http://www.nhl.com/ice/playerstats.htm?fetchKey=20122ALLSASAll&viewName=summary&sort=points&pg=$i", $getRows);
		$aPlayerNum = getPlayerNumXXofYYY($sStatsSummary);
		
		$sPlayerNumXXOf = $aPlayerNum[0];
		$sPlayerNumOfYYY = $aPlayerNum[2];
	} // End for loop
?>
