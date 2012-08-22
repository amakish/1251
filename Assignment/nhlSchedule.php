<?php 

	// ****************************************
	// getContent()
	$aNewLines = array("\t","\n","\r","\x20\x20","\0","\x0B");
	$sUrl = "http://www.nhl.com/ice/schedulebyseason.htm#?navid=nav-sch-sea";
	$sRaw = file_get_contents($sUrl);
	$sContent = str_replace($aNewLines, "", html_entity_decode($sRaw));
	
	// ****************************************
	// getTbody()
	$sTbodyStart = strpos($sContent,'<tbody');
	$sTbodyEnd = strpos($sContent,'</tbody>',$sTbodyStart) + 7;
	$sTbody = substr($sContent, $sTbodyStart, $sTbodyEnd - $sTbodyStart);

	// ****************************************
	// getRowsSchedule()
	preg_match_all("|<tr(.*)</tr>|U",$sTbody,$rows);
	
	foreach ($rows[0] as $row){
		if ((strpos($row,'<th')===false)){
			preg_match_all("|<td(.*)</td>|U",$row,$cells);
	 
			$date = 		strip_tags($cells[0][0]);
			$vteam = 		strip_tags($cells[0][1]);
			$hteam = 		strip_tags($cells[0][2]);
			$time = 		strip_tags($cells[0][3]);
			$network = 		strip_tags($cells[0][4]);

			echo "Date: {$date} | Visiting Team: {$vteam} | Home Team: {$hteam} | Time: {$time}  | Network: {$network} |\n";
		} // End if
			
	} // End foreach
?>