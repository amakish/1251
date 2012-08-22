<?php
	
		// ****************************************
		// getContent()
		$aNewLines = array("\t","\n","\r","\x20\x20","\0","\x0B");
		$sUrl = "http://www.nhl.com/ice/playerstats.htm?fetchKey=20122ALLSASAll&viewName=summary&sort=points&pg=$i";
		$sRaw = file_get_contents($sUrl);
		$sContent = str_replace($aNewLines, "", html_entity_decode($sRaw));
			
		// ****************************************
		// getTbody()
		$sTbodyStart = strpos($sContent,'<tbody');
		$sTbodyEnd = strpos($sContent,'</tbody>',$sTbodyStart) + 7;
		$sTbody = substr($sContent, $sTbodyStart, $sTbodyEnd - $sTbodyStart);
			
		// ****************************************
		// getPageNum()
		$sDivPageNumStart = strpos($sContent, '<div class="numRes"') + 19;
		$sDivPageNumEnd = strpos($sContent, '</div>', $sDivPageNumStart);
		$sDivPageNum = substr($sContent,$sDivPageNumStart, $sDivPageNumEnd - $sDivPageNumStart);
	
		$sTempString1 = explode("-", $sDivPageNum);
		$sTempString2 = $sTempString1[1];
		$sPageNum = explode(" ", $sTempString2);
			
		$sPageNumXOf = $sPageNum[0];
		$sPageNumOfX = $sPageNum[2];
			
		// ****************************************
		// getRowsScoringSummary()
		preg_match_all("|<tr(.*)</tr>|U",$sTbody,$rows);
	
		foreach ($rows[0] as $row){
			if ((strpos($row,'<th')===false)){
				preg_match_all("|<td(.*)</td>|U",$row,$cells);
	
				$rk = 			strip_tags($cells[0][0]);
				$player = 		strip_tags($cells[0][1]);
				$team = 		strip_tags($cells[0][2]);
				$pos = 			strip_tags($cells[0][3]);
				$gp = 			strip_tags($cells[0][4]);
				$g = 			strip_tags($cells[0][5]);
				$a = 			strip_tags($cells[0][6]);
				$pts = 			strip_tags($cells[0][7]);
				$plusminus = 	strip_tags($cells[0][8]);
				$pim = 			strip_tags($cells[0][9]);
				$ppg = 			strip_tags($cells[0][10]);
				$shg = 			strip_tags($cells[0][11]);
				$gwg = 			strip_tags($cells[0][12]);
				$otg = 			strip_tags($cells[0][13]);
				$sog = 			strip_tags($cells[0][14]);
				$pct = 			strip_tags($cells[0][15]);
				$toiperg = 		strip_tags($cells[0][16]);
				$sftperg = 		strip_tags($cells[0][17]);
				$foper = 		strip_tags($cells[0][18]);
	
				echo "RK: {$rk} | {$player} | Team: {$team} | Pos: {$pos} | GP: {$gp}  | G: {$g}  | A: {$a}  | Pts: {$pts}  | +/-: {$plusminus}  | PIM: {$pim} | PPG: {$ppg} | SHG: {$shg}  | GWG: {$gwg}  | OTG: {$otg} | SOG: {$sog}  | Pct: {$pct} | TOI/G: {$toiperg}  | Sft/G: {$sftperg} | FO%: {$foper} |\n";
			} // End if
	
	} // End foreach
				
			if($sPageNumXOf == $sPageNumOfX) {
			break;
			} // End if

	
	// ******************************************************
	// getPageNum()
			function getPageNum($sContentStatsSummary) {
			$sStartPageNum = strpos($sContentStatsSummary, '<div class="numRes"') + 20;
					$sEndPageNum = strpos($sContentStatsSummary, '</div>', $sStartPageNum);
					$sDivPageNum = substr($sContentStatsSummary,$sStartPageNum, $sEndPageNum - $sStartPageNum);
	
					$sTempString1 = explode("-", $sDivPageNum);
					$sTempString2 = $sTempString1[1];
					$sPageNum = explode(" ", $sTempString2);
	
					return $sPageNum;
			}
	
			function getStatsSummary($sUrl, $fgetRows) {
	
			// ******************************************************
				// getContent()
	
				$sUrlStatsSummary = $sUrl;
				$sNewLines = array("\t","\n","\r","\x20\x20","\0","\x0B");
				$sRawStatsSummary = file_get_contents($sUrlStatsSummary);
				$sContentStatsSummary = str_replace($sNewLines, "", html_entity_decode($sRawStatsSummary));
	
				// ******************************************************
				// getTbody()
				$sStartSummary = strpos($sContentStatsSummary,'<tbody');
				$sEndSummary = strpos($sContentStatsSummary,'</tbody>',$sStartSummary) + 7;
				$tableSummary = substr($sContentStatsSummary, $sStartSummary, $sEndSummary - $sStartSummary);
	
				// ******************************************************
				// getRows()
	
				preg_match_all("|<tr(.*)</tr>|U",$tableSummary,$rowsSummary);
	
				$fgetRows($rowsSummary);
	
				return $sContentStatsSummary;
	
			} // End getStatsSummary
	
	
			$getRows = function($aRowsSummary){
				foreach ($aRowsSummary[0] as $row){
					if ((strpos($row,'<th')===false)){
						preg_match_all("|<td(.*)</td>|U",$row,$cells);
	
						$rk = 			strip_tags($cells[0][0]);
						$player = 		strip_tags($cells[0][1]);
						$team = 		strip_tags($cells[0][2]);
						$pos = 			strip_tags($cells[0][3]);
						$gp = 			strip_tags($cells[0][4]);
						$g = 			strip_tags($cells[0][5]);
						$a = 			strip_tags($cells[0][6]);
						$pts = 			strip_tags($cells[0][7]);
						$plusminus = 	strip_tags($cells[0][8]);
						$pim = 			strip_tags($cells[0][9]);
						$ppg = 			strip_tags($cells[0][10]);
						$shg = 			strip_tags($cells[0][11]);
						$gwg = 			strip_tags($cells[0][12]);
						$otg = 			strip_tags($cells[0][13]);
						$sog = 			strip_tags($cells[0][14]);
						$pct = 			strip_tags($cells[0][15]);
						$toiperg = 		strip_tags($cells[0][16]);
						$sftperg = 		strip_tags($cells[0][17]);
						$foper = 		strip_tags($cells[0][18]);
	
						echo "RK: {$rk} | {$player} | Team: {$team} | GP: {$gp}  | G: {$g}  | A: {$a}  | Pts: {$pts}  | +/-: {$plusminus}  | PIM: {$pim} | PPG: {$ppg} | SHG: {$shg}  | GWG: {$gwg}  | OTG: {$otg} | SOG: {$sog}  | Pct: {$pct} | TOI/G: {$toiperg}  | Sft/G: {$sftperg} | FO%: {$foper} |\n";
					} // End if
	
				} // End foreach
	}; // End getRows
	
	
	$sPageNumXOf = "junk";
	$sPageNumOfX = "";
	
	for($i=1; $sPageNumXOf != $sPageNumOfX; $i++) {
	
		$sContentStatsSummary = getStatsSummary("http://www.nhl.com/ice/playerstats.htm?fetchKey=20122ALLSASAll&viewName=summary&sort=points&pg=$i", $getRows);
	
		$aPageNum = getPageNum($sContentStatsSummary);
	
		$sPageNumXOf = $aPageNum[0];
		$sPageNumOfX = $aPageNum[2];
	
	} // End for loop
?>
