<html><body>
	<?php
		require 'model/dog.php';
		include 'views/form.php';
		
		$oBingo = new dog('collie');
		
		if(array_key_exists('food', $_POST))
		{
			$oBingo->eat($_POST['food']);
		} // End if
		
		include 'views/feelings.php';
	
	?>
</body></html>