<?php
    // get the data from the form
    $product_description = $_POST['product_description'];
    $nPriceWithHST = $_POST['price_with_hst'];
    $nHST = $_POST['hst_percent'];
    
	$nOriginal = $nPriceWithHST /(1 + $nHST * .01);
	
	$sPriceWithHST = "$" . number_format($nPriceWithHST, 2);
	$sOriginal = "$" . number_format($nOriginal, 2);
	$sHSTAmount = "$" . number_format($nPriceWithHST - $nOriginal, 2);
	$sHST = number_format($nHST) . "%";
       
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <div id="content">
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo $product_description; ?></span><br />

        <label>Price with HST added:</label>
        <span><?php echo $sPriceWithHST; ?></span><br />

        <label>HST Percentage:</label>
        <span><?php echo $sHST; ?></span><br />

        <label>HST Amount:</label>
        <span><?php echo $sHSTAmount; ?></span><br />

        <label>Price before HST:</label>
        <span><?php echo $sOriginal; ?></span><br />

        <p>&nbsp;</p>
    </div>
</body>
</html>