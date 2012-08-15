<?php
	
	function sayHello() {
		echo "Hello World!";
	} // End sayHello

	$fSayGoodDay = function() {
		echo "good day!";
	}; // End fSayGoodDay
	
	function callMeBack($fCallMe) {
		$fCallMe();
	} // End callMeBack
?>

<html><body><?php callMeBack($fSayGoodDay); ?></body></html>