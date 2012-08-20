<?php
	$sNewLines = array("\t","\n","\r","\x20\x20","\0","\x0B");
	
	$sUrlSched = "http://www.nhl.com/ice/schedulebyseason.htm#?navid=nav-sch-sea";
	
	$sRawSched = file_get_contents($sUrlSched);
	$sContentSched = str_replace($sNewLines, "", html_entity_decode($sRawSched));
	
	$sStartSched = strpos($sContentSched,'<tbody');
	$sEndSched = strpos($sContentSched,'</tbody>',$sStartSched) + 7;
	$tableSched = substr($sContentSched, $sStartSched, $sEndSched - $sStartSched);
	
	preg_match_all("|<tr(.*)</tr>|U",$tableSched,$rowsSched);
	
	foreach ($rowsSched[0] as $row){
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