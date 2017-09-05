 <?php
	//this page allows users to put items into a shopping cart
	include_once('webconfig.php');
	include_once(ABSOLUTE_PATH . '/classes/product.class.php');
	include_once(ABSOLUTE_PATH . '/classes/fruit_product.class.php');
	include_once(ABSOLUTE_PATH . '/classes/veggie_product.class.php');
	session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>I've Got A Lovely Bunch of Coconuts: Cart!</title>
<link type="text/css" rel="stylesheet" href="<?php echo URL_ROOT . '/styles.css' ?>" />
</head>

<body>

<p><b>Your Cart</b></p>

<?php
	//get the cart stored in session
	$aryCartArray = unserialize($_SESSION['aryCartArray']);

	//get the product array stored in session
	$aryProductsArray = unserialize($_SESSION['aryProductArray']);
	
	//for each item in the cart array, loop through and write out the quantity and item name
	
	for ($x=0; $x < count($aryCartArray); $x++) {

		$aryCartItemArray = $aryCartArray[$x];
		
		//find the corresponding product in the product array
        // Error: Missing semi-colon at the end of the assignment statement. Add at the end to complete statement.
        // Error: $aryProductArray is mispelled. Fix by adding s to the end.
		$thisProduct = $aryProductsArray[$aryCartItemArray[0]];
		
		echo "<b>" . $thisProduct->product_name . "</b>" . " Qty: " . $aryCartItemArray[1] . "<br />";
		
	}

?>

<br />
<br />
<br />
<a href="index.php">Start all over again</a><br />
<i>This will reset your inventory.</i><strong></strong>

</body>
</html>