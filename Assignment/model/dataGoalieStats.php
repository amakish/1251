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
	// getGoalieStats
	// ******************************************************
	function getGoalieStats($sUrl, $fgetRows) {
		// get file contents
		$sUrlInternal = $sUrl;
		$sNewLines = array("\t", "\n", "\r", "\x20\x20", "\0", "\x0B", "NHL Winter Classic ");
		$sRawContent = run_curl($sUrlInternal);		
		$sContent = str_replace($sNewLines, "", html_entity_decode($sRawContent));
	
		// isolate the tbody
		$sTbodyStart = strpos($sContent,'<tbody');
		$sTBodyEnd = strpos($sContent,'</tbody>',$sTbodyStart) + 7;
		$sTBody = substr($sContent, $sTbodyStart, $sTBodyEnd - $sTbodyStart);
	
		// isolate the rows within the tbody
		preg_match_all("|<tr(.*)</tr>|U", $sTBody, $aRows);
		$fgetRows($aRows);
	
		return $sContent;
	} // End getGoalieStats
	
	// ******************************************************
	// getPlyrNumXXofYYY		(ie 1-XX of YYY results.)
	// ******************************************************
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
	// Anonymous Functions (Callback)
	// ******************************************************
	// fgetRowsStatsSummary
	// ******************************************************
	function fgetRowsStatsSummary($aRows){
		foreach ($aRows[0] as $aRow){
			if ((strpos($aRow,'<th')===false)){
				preg_match_all("|<td(.*)</td>|U", $aRow, $aCells);
				
					// get Id
					$sNameUrl = $aCells[0][1];
					$aNameUrl = parse_url($sNameUrl);
					$sId = substr($aNameUrl['query'], 3, 7);
	
					// get name and team
					$sName = 				strip_tags($aCells[0][1]);
					$sTeam = 				strip_tags($aCells[0][2]);
					$sTeamFirst = 			substr($sTeam, 0, 3);
					$sTeamCurrent = 		substr($sTeam, -3);

					// create new skater, if player already exists then load stats overtop
					$oGoalieStat = new goaliestat;
					$oGoalieStat->Load('id = ?', array($sId));
					
					// update/insert stats
					$oGoalieStat->id  = 		$sId;
					$oGoalieStat->rk  = 		strip_tags($aCells[0][0]);
					$oGoalieStat->name = 		$sName;
					$oGoalieStat->team = 		$sTeam;
					$oGoalieStat->teamcur = 	$sTeamCurrent;
					$oGoalieStat->pos = 		"G";
					$oGoalieStat->gp = 			strip_tags($aCells[0][3]);
					$oGoalieStat->gs = 			strip_tags($aCells[0][4]);
					$oGoalieStat->w = 			strip_tags($aCells[0][5]);
					$oGoalieStat->l = 			strip_tags($aCells[0][6]);
					$oGoalieStat->ot =			strip_tags($aCells[0][7]);
					$oGoalieStat->sa =			strip_tags($aCells[0][8]);
					$oGoalieStat->ga = 			strip_tags($aCells[0][9]);
					$oGoalieStat->gaa = 		strip_tags($aCells[0][10]);
					$oGoalieStat->sv = 			strip_tags($aCells[0][11]);
					$oGoalieStat->svper = 		strip_tags($aCells[0][12]);
					$oGoalieStat->so = 			strip_tags($aCells[0][13]);
					$oGoalieStat->g = 			strip_tags($aCells[0][14]);
					$oGoalieStat->a = 			strip_tags($aCells[0][15]);
					$oGoalieStat->pim = 		strip_tags($aCells[0][16]);
					$oGoalieStat->toi = 		strip_tags($aCells[0][17]);
					
					$id = 			$oGoalieStat->id;
					$rk = 			$oGoalieStat->rk;
					$name = 		$oGoalieStat->name;
					$teamcur = 		$oGoalieStat->teamcur;
					$pos = 			$oGoalieStat->pos;
					$gp = 			$oGoalieStat->gp;
					$gs = 			$oGoalieStat->gs;
					$w =	 		$oGoalieStat->w;
					$l = 			$oGoalieStat->l;
					$ot =	 		$oGoalieStat->ot;
					$sa =		 	$oGoalieStat->sa;
					$ga = 			$oGoalieStat->ga;
					$gaa = 			$oGoalieStat->gaa;
					$sv = 			$oGoalieStat->sv;
					$svper =		$oGoalieStat->svper;
					$so = 			$oGoalieStat->so;
					$g = 			$oGoalieStat->g;
					$a =	 		$oGoalieStat->a;
					$pim =	 		$oGoalieStat->pim;
					$toi =		 	$oGoalieStat->toi;
					
					echo " | ID: {$id} | RK: {$rk} | {$name} | Team: {$teamcur} | Pos: {$pos} | GP: {$gp} | GS: {$gs}  | W: {$w}  | L: {$l}  | OT: {$ot}  | SA: {$sa}  | GA: {$ga} | GAA: {$gaa} | SV: {$sv}  | SV%: {$svper}  | SO: {$so} | G: {$g}  | A: {$a} | PIM: {$pim}  | TOI: {$toi} |\n";

					$rc = $oGoalieStat->save();
					if(!$rc){
						echo $oGoalieStat->errormsg();
					} //db error messages
			} // End if
		} // End foreach
	}; // End fgetRowsStatsSummary
	
	// ******************************************************
	// fgetRowsStatsBio
	// ******************************************************
	function fgetRowsStatsBio($aRows){
		foreach ($aRows[0] as $aRow){
			if ((strpos($aRow,'<th')===false)){
				preg_match_all("|<td(.*)</td>|U", $aRow, $aCells);
				
				// get Id
				$sNameUrl = $aCells[0][1];
				$aNameUrl = parse_url($sNameUrl);
				$sId = substr($aNameUrl['query'], 3, 7);

				// get name and team
				//$sName = 				strip_tags($aCells[0][1]);
				//$sTeam = 				strip_tags($aCells[0][2]);
				//$sTeamFirst = 			substr($sTeam, 0, 3);
				//$sTeamCurrent = 		substr($sTeam, -3);

				// get dob
				$sDob =	strip_tags($aCells[0][3]);
				$sDobFormat = str_replace("'","", $sDob);
				$tsDob = strtotime(str_replace(" ","-", $sDobFormat));
				$dDob = date("Y-m-d", $tsDob);
				// calculate age
				$dAge = number_format(((time() - $tsDob) / 31556926), 1);
				
				// use player id to verify whether player already exists in db
				// $oGoalieStat = GoalieStat::find('first', array('conditions' => array('id = ?', $sId)));
				
				// create new goalie, if player already exists then load stats overtop
				$oGoalieStat = new goaliestat;
				$oGoalieStat->Load('id = ?', array($sId));
				
				// update/insert stats
				//$oGoalieStat->id  = 		$sId;
				//$oGoalieStat->rk  = 		strip_tags($aCells[0][0]);
				//$oGoalieStat->name = 		$sName;
				//$oGoalieStat->team = 		$sTeam;
				//$oGoalieStat->teamcur = 	$sTeamCurrent;
				$oGoalieStat->dob = 		$dDob;
				$oGoalieStat->age = 		$dAge;
				
				//$id = 			$oGoalieStat->id;
				//$rk = 			$oGoalieStat->rk;
				//$name = 		$oGoalieStat->name;
				//$team = 		$oGoalieStat->team;
				//$teamcur = 		$oGoalieStat->teamcur;
				$dob = 			$oGoalieStat->dob;
				$age =			$oGoalieStat->age;
				
				echo " | Dob: {$dob} | Age: {$age} |\n";
				
				$rc = $oGoalieStat->save();
				if(!$rc){	
					echo $oGoalieStat->errormsg();
				}
			} // End if
		} // End foreach
	}; // End fgetRowsStatsBio

	// ******************************************************
	// Logic
	// ******************************************************
	// Goalie Stats - Summary
	// ******************************************************
	$sPlyrNumXXOf = "junk";
	$sPlyrNumOfYYY = "";

	for($i=1; $sPlyrNumXXOf != $sPlyrNumOfYYY; $i++) {
		$sStatsSummary = getGoalieStats("http://www.nhl.com/ice/playerstats.htm?fetchKey=20122ALLGAGALL&viewName=summary&sort=wins&pg=$i", "fgetRowsStatsSummary");
		$aPlyrNum = getPlyrNumXXofYYY($sStatsSummary);
	
		$sPlyrNumXXOf = $aPlyrNum[0];
		$sPlyrNumOfYYY = $aPlyrNum[2];
	} // End for loop
	
	// ******************************************************
	// Goalie Stats -  Bio
	// ******************************************************
	$sPlyrNumXXOf = "junk";
	$sPlyrNumOfYYY = "";
	
	for($i=1; $sPlyrNumXXOf != $sPlyrNumOfYYY; $i++) {
		$sStatsBio = getGoalieStats("http://www.nhl.com/ice/playerstats.htm?fetchKey=20122ALLGAGALL&viewName=goalieBios&sort=player.birthCountryAbbrev&pg=$i", "fgetRowsStatsBio");
		$aPlyrNum = getPlyrNumXXofYYY($sStatsBio);
	
		$sPlyrNumXXOf = $aPlyrNum[0];
		$sPlyrNumOfYYY = $aPlyrNum[2];
	} // End for loop

?>