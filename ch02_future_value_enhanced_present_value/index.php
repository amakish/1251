<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Present Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <div id="content">
    <h1>Present Value Calculator</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if 
	else
	{
		$investment = "";
		$interest_rate = "";
		$years = "";
	} // end else
	?>
	
    <form action="display_results.php" method="post">

        <div id="data">
            <label>Future Value Amount:</label>
            <input type="text" name="investment"
                   value="<?php echo $investment; ?>"/><br />

            <label>Yearly Interest Rate:</label>
            <input type="text" name="interest_rate"
                   value="<?php echo $interest_rate; ?>"/><br />

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php echo $years; ?>"/><br />
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"/><br />
        </div>

    </form>
    </div>
</body>
</html>