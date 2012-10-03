<?php
	session_start();
	if (!isset($_SESSION['pagenum'])) {
		$_SESSION['pagenum'] = 0;
	} else {
		$_SESSION['pagenum']++;
	}
	print_r($_SESSION);
?>


