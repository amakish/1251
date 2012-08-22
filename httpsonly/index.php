<?php
	// make sure the page uses a secure commection
	if (!isset($_SERVER['HTTPS'])) {
		// then we are not on https
		$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		// echo $url . "\n";
		// print_r($_SERVER);
		header("Location: " . $url);
		exit();
	} // End if
?>
<html>
<body>
Hello World!
</body>
</html>