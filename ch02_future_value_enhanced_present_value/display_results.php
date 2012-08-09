<?php
    // get the data from the form
    $investment = $_POST['investment'];
    $interest_rate = $_POST['interest_rate'];
    $years = $_POST['years'];

    // validate investment entry
    if ( empty($investment) ) {
        $error_message = 'Investment is a required field.'; 
    } else if ( !is_numeric($investment) )  {
        $error_message = 'Investment must be a valid number.'; 
    } else if ( $investment <= 0 ) {
        $error_message = 'Investment must be greater than zero.';        
    // validate interest rate entry
    } else if ( empty($interest_rate) ) {
        $error_message = 'Interest rate is a required field.'; 
    } else if ( !is_numeric($interest_rate) )  {
        $error_message = 'Interest rate must be a valid number.'; 
    } else if ( $interest_rate <= 0 || $interest_rate > 15) {
        $error_message = 'Interest rate must be greater than zero and less that or equal to 15.';
	} else if ( !is_numeric($years) )  {
        $error_message = 'Number of years must be a valid number.'; 
    } else if ( $years <= 0 || $years > 50) {
        $error_message = 'Number of years must be greater than zero and less than or equal to 50.';    
    // set error message to empty string if no invalid entries
    } else {
        $error_message = '';
    }

    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('index.php');
        exit();
    }
	
	// calculate the present value
	$future_value = $investment;
	$present_value = $future_value * (1.0 / pow(1.0 + ($interest_rate *.01), $years));

    // apply currency, percent and date formatting
    $investment_f = '$'.number_format($investment, 2);
    $yearly_rate_f = $interest_rate.'%';
    $present_value_f = '$'.number_format($present_value, 2);
	$date = date('m/d/Y');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <div id="content">
        <h1>Future Value Calculator</h1>

        <label>Future Amount:</label>
        <span><?php echo $investment_f; ?></span><br />

        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span><br />

        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br />

        <label>Present Amount:</label>
        <span><?php echo $present_value_f; ?></span><br />
		
        <span><br /><?php echo "This calculation was done on " . $date; ?></span><br />
    </div>
</body>
</html>