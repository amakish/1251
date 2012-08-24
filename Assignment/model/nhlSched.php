<?php
	// ******************************************************
	// Functions
	// ******************************************************
	// getSched
	function getSched($sUrl, $fgetRows) {
		// get file contents
		$sUrlInternal = $sUrl;
		$sNewLines = array("\t", "\n", "\r", "\x20\x20", "\0", "\x0B");
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
	} // End getSched
	
	// ******************************************************
	// Anonymous Function (Callback)
	// ******************************************************
	// fgetRowsSched
	$fgetRowsSched = function($aRows){
		foreach ($aRows[0] as $aRow){
			if ((strpos($aRow,'<th') === false) &&
				(strpos($aRow,'<td rowspan="1" style="display: none;" colspan="100%"') === false) &&
				(strpos($aRow,'<td rowspan="1" style="color: #fff; font-weight: bold; background-color: #999; border-top: 1px solid #777;" colspan="100%"') === false) &&
				(strpos($aRow,'<td rowspan="1" style="border-bottom: 1px solid #666; background-color: #fff; height: 8px; border-width: 0 0 1px 0" colspan="100%"') === false)) {

				// $aRow = str_replace('Montr�al', 'Montreal', $aRow);
				
				preg_match_all("|<td(.*)</td>|U", $aRow, $aCells);
	
				$sDate = 		strip_tags($aCells[0][0]);
				$sVTeam = 		strip_tags($aCells[0][1]);
				$sHTeam = 		strip_tags($aCells[0][2]);
				$sTime =		strip_tags($aCells[0][3]);
				$sResult =		strip_tags($aCells[0][4]);
	
				echo "Date: {$sDate} | Visiting Team: {$sVTeam}  | Home Team: {$sHTeam}  | Time: {$sTime} | Result: {$sResult} |\n";
			} // End if
		} // End foreach
	}; // End fgetRowsSched


	// ******************************************************
	// Logic
	$sSched = getSched("http://www.nhl.com/ice/schedulebyseason.htm?season=20122013&gameType=2&team=&network=&venue=", $fgetRowsSched);
?>