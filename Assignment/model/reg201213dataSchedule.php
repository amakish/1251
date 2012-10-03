<?php
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
	// getSched
	// ******************************************************
	function getSched($sUrl, $fgetRows) {
		// get file contents
		$sUrlInternal = $sUrl;
		$sNewLines = array("\t", "\n", "\r", "\x20\x20", "\0", "\x0B");
		$sRawContent = file_get_contents($sUrlInternal);
		
		// strip unnecessary characters and accents
		$sContent = str_replace($sNewLines, "", html_entity_decode($sRawContent));
		$sContent = stripAccents($sContent);
		
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
	// stripAccents
	function stripAccents($stripAccents){
		return preg_replace('/\xc3\xa9/', 'e', $stripAccents);
	} // End stripAccents
	
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
				preg_match_all("|<td(.*)</td>|U", $aRow, $aCells);
				
				// create new schedule
				$oSchedule = new reg201213tschedule;
				
				// update/insert stats
				$sDateInternal = 	strip_tags($aCells[0][0]);
				$iDateInternalLen = ((int)strlen($sDateInternal) / 2);
				$sDate =			substr($sDateInternal, 0, $iDateInternalLen);
				$sVTeam = 			strip_tags($aCells[0][1]);
				$sHTeam = 			strip_tags($aCells[0][2]);

				$sTimeInternal =	strip_tags($aCells[0][3]);
				$aTime = explode("ET", $sTimeInternal, -1);

				$sTime =			$aTime[0] . "ET";
				$sResult =			strip_tags($aCells[0][4]);
				
				$oSchedule->date = 			$sDate;
				$oSchedule->vteam = 		$sVTeam;
				$oSchedule->hteam = 		$sHTeam;
				$oSchedule->time = 			$sTime;
				$oSchedule->result = 		$sResult;

				echo " | Date: {$sDate} | Visiting Team: {$sVTeam}  | Home Team: {$sHTeam}  | Time: {$sTime} | Result: {$sResult} |\n";
				
				$rc = $oSchedule->save();
				if(!$rc){
					echo $oSchedule->errormsg();
				} //db error messages
				
			} // End if
		} // End foreach
	}; // End fgetRowsSched

	// ******************************************************
	// Logic
	$sSched = getSched("http://www.nhl.com/ice/schedulebyseason.htm?season=20122013&gameType=2&team=&network=&venue=", $fgetRowsSched);
?>