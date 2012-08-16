<?php
	function getCDs()
	{
		global $db;
		$query = 'select name from mycds';
		return $db->query($query);
	} // End getCDs
	
	function addCD($sTitle)
	{
		global $db;
		$query = "INSERT INTO mycds (name)
				  VALUES ('$sTitle')";
		$db->exec($query);
	} // End addCD
?>