<?php
	
	$showIndex = true;
	$clean = array();
	
	if (isset($_POST['req_name_first'])) {
		$values = array(											// initially assign all form fields null
			'req_name_first'	=> null,
			'req_name_last'		=> null,
			'req_email'			=> null,
			'phone'				=> null,
			'req_message'		=> null);

		$values = array_merge($values, $_POST);						// if values in both $values & $_POST, $_POST overwrites $values
																	// merges data to verify that all inputs have a value
		if (in_array(null, $values, true)) {						// searches array $values for null, if true
			echo "Danger!";
		}
		else {
			
			if (testCompleted($values['req_name_first'])) {				
				$clean['req_name_first'] = $values['req_name_first'];					// the data is now clean, meaning it appears to be what we expected, so we pass the name along to the clean array
			}
			
			if (testCompleted($values['req_name_last'])) {				
				$clean['req_name_last'] = $values['req_name_last'];					// the data is now clean, meaning it appears to be what we expected, so we pass the name along to the clean array
			}
			
			if (testEmail($values['req_email'])) {
				$clean['req_email'] = $values['req_email'];
			}
			
			if (testPhone($values['phone'])) {
				$clean['phone'] = $values['phone'];
			}
			
			if (testCompleted($values['req_message'])) {
				$clean['req_message'] = $values['req_message'];
			}
			
			$to = 'aaron.makish@gmail.com';
			$subject = sprintf('Portfolio message from %s', $clean['req_name_first'], $clean['req_name_last']);
			$message = sprintf('%s\r\nPhone: %s', $clean['req_message'], $clean['phone']);
			$headers = sprintf('From: %s', $clean['req_email']);
			
			mail($to, $subject, $message, $headers);
		} // End else
	} // End if
	
	if (isset($_GET['p'])) {
	$p = $_GET['p'];
	}
	else {
		$p = "index";
	}
	
	switch ($p) {
		case "contact":
			$page=file_get_contents('./view/contact.html');
			break;
		default:
			$page = file_get_contents('./view/index.html');
			break;
	}
	
	echo $page;
	

	function testCompleted($value) {
		return (!empty($value) && strlen(trim($value)) !=0);		// !empty tests for null because checking stringlength with a value null produces an error
	} // End testCompleted											// we trim first to get rid of leading and trailing spaces, then check the length
	
	function testEmail($req_email) {
		$emailRegEx = '/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i';
		
		return preg_match($emailRegEx, $req_email);						// preg_match is the regular expression matching function, returns true if they match, false if they don't
	} // End testEmail
	
	function testPhone($phone) {
		$phoneRegEx = '/^\(?[0-9]{3}\)?[\s-.]?[0-9]{3}[\s-.]?[0-9]{4}$/';
		
		return preg_match($phoneRegEx, $phone);						// preg_match is the regular expression matching function, returns true if they match, false if they don't
	} // End testEmail
?>

