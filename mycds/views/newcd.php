<html><body>
<?php
	foreach($aMyCDs as $aCD)
	{
		echo $aCD['name'];
	} // End foreach
?>

<form action='.' method="post">
	<input type="text" name="title" />
	<input type="submit" value="Add" />

</form>

</body></html>