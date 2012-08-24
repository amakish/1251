<?php
	header("Content-Type: text/plain");
	$sIn = file_get_contents("http://gdata.youtube.com/feeds/api/users/rhildred/uploads");
	
	if(preg_match_all("|<title(.*)</title>|U", $sIn, $aIn)){
		// print_r($aIn);
		foreach($aIn[0] as $sTitle){
			echo $sTitle . "\n";
		} // End foreach
	}
	else{
		echo "nothing to display";
	} // End else
?>
