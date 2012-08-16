<html><body>
	<?php
		require 'model/database.php';
		include 'views/form.php';
		
		// Get all cd's
		$query = "SELECT * FROM cd
		ORDER BY id";
		$products = $db->query($query);
	
	?>
</body></html>