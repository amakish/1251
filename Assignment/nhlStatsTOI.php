<?php
	//function getStats($sURL, $fRows)
	//{
		$sPageNumXOf = "junk";
		$sPageNumOfX = "";
		
		for($i=1; $sPageNumXOf != $sPageNumOfX; $i++) {

			// ****************************************
			// getContent()
			$aNewLines = array("\t","\n","\r","\x20\x20","\0","\x0B");
			$sUrl = "http://www.nhl.com/ice/playerstats.htm?fetchKey=20122ALLSASALL&viewName=timeOnIce&sort=timeOnIce&pg=i";
			$sRaw = file_get_contents($sUrl);
			$sContent = str_replace($aNewLines, "", html_entity_decode($sRaw));
			
			// ****************************************
			// getTbody()
			$sTbodyStart = strpos($sContent,'<tbody');
			$sTbodyEnd = strpos($sContent,'</tbody>',$sTbodyStart) + 7;
			$sTbody = substr($sContent, $sTbodyStart, $sTbodyEnd - $sTbodyStart);
			
			// ****************************************
			// getPageNum()
			$sDivPageNumStart = strpos($sContent, '<div class="numRes">') + 20;
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
					$estoi = 		strip_tags($cells[0][5]);
					$estopperg = 	strip_tags($cells[0][6]);
					$shtoi = 		strip_tags($cells[0][7]);
					$shtoiperg = 	strip_tags($cells[0][8]);
					$pptoi = 		strip_tags($cells[0][9]);
					$pptoiperg = 	strip_tags($cells[0][10]);
					$toi = 			strip_tags($cells[0][11]);
					$toiperg = 		strip_tags($cells[0][12]);
					$shfts = 		strip_tags($cells[0][13]);
					$toipershft = 	strip_tags($cells[0][14]);
					$shftperg = 	strip_tags($cells[0][15]);
			 
					echo "RK: {$rk} | {$player} | Team: {$team} | Pos: {$pos} | GP: {$gp}  |ESTOI: {$estoi}  | ESTOI/G: {$estoiperg}  | SHTOI: {$shtoi}  | SHTOI/G: {$shtoiperg} | PPTOI: {$pptoi} | PPTOI/G: {$pptoiperg} | TOI: {$toi}  | TOI/G: {$toiperg} | SHIFTS: {$shfts} | TOI/SHIFT: {$toipershft} | Shifts/G {$shftperg}|\n";
				} // End if
				
			} // End foreach
			
			if($sPageNumXOf == $sPageNumOfX) {
				break;
			} // End if
			
		} // End for loop
	//} // End getStats
?>