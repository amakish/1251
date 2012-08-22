<?php
		$sPageNumXOf = "junk";
		$sPageNumOfX = "";
		
		for($i=1; $sPageNumXOf != $sPageNumOfX; $i++) {

			// ****************************************
			// getContent()
			$aNewLines = array("\t","\n","\r","\x20\x20","\0","\x0B");
			$sUrl = "http://www.nhl.com/ice/playerstats.htm?fetchKey=20122ALLSASALL&viewName=scoringLeaders&sort=powerPlayGoals&pg=i";
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
					$esg = 			strip_tags($cells[0][5]);
					$esa = 			strip_tags($cells[0][6]);
					$espts = 		strip_tags($cells[0][7]);
					$ppg = 			strip_tags($cells[0][8]);
					$ppa = 			strip_tags($cells[0][9]);
					$ppp = 			strip_tags($cells[0][10]);
					$shg = 			strip_tags($cells[0][11]);
					$sha = 			strip_tags($cells[0][12]);
					$shp = 			strip_tags($cells[0][13]);
					$gwg = 			strip_tags($cells[0][14]);
					$otg = 			strip_tags($cells[0][15]);
			 
					echo "RK: {$rk} | {$player} | Team: {$team} | Pos: {$pos}  | GP: {$gp}  | ESG: {$esg}  | ESA: {$esa}  | ESPts: {$espts}  | PPG: {$ppg}  | PPA: {$ppa} | PPP: {$ppp} | SHG: {$shg}  | SHA: {$sha}  | SHP: {$shp} | GWG: {$gwg}  | OTG: {$otg} |\n";
				} // End if
				
			} // End foreach
			
			if($sPageNumXOf == $sPageNumOfX) {
				break;
			} // End if
			
		} // End for loop
?>