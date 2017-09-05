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
<title>I've Got A Lovely Bunch of Coconuts: Shop!</title>
<link type="text/css" rel="stylesheet" href="<?php echo URL_ROOT . '/styles.css' ?>" />
</head>

<body>

<div id="wrapper">

	<h2>Please select the quantity of items you would like to put into your Shopping Cart</h2>
  

	<div class="form-container">

	<form action="<?php echo URL_ROOT . '/add_products_to_cart.php' ?>" method="POST">
    
    <?php
		//create a loop that writes a form that displays all of the products in the SESSION inventory array

		$aryProductArray = unserialize($_SESSION['aryProductArray']);
	
	    // Error: Misspelled variable $arryProductArray should be $aryProductArray
		for ($x = 0; $x < count($aryProductArray); $x++) {
	?>
    <fieldset>
		<legend>Product Details</legend>
			
            <?php
				//pull the next object out of the array
				$thisProduceItem = $aryProductArray[$x];
			?>
            
            <div>
            	<b><?php echo $thisProduceItem->product_name ?></b><br />
                Price: $<?php echo $thisProduceItem->product_price ?>
                
                <?php
					switch ($thisProduceItem->price_type) {
						case 1:
							echo "/per pound";
							break;	
						case 2:
							echo "/each";
							break;
// Error: Missing a curly brace to close off the case statement. Fix by adding a curly brace
                                                }
				?>
			</div>
            
			<div><label for="quantity<?php echo $x ?>">Quantity Requested</label> <input id="quantity<?php echo $x ?>" name="quantity<?php echo $x ?>" type="text" size="10" /></div>
	</fieldset>
    
    <?php		
			
		}
	?>
	
	
    
	<div class="buttonrow">
		<input type="submit" value="Save" class="button" />

		<input type="button" value="Discard" class="button" />
	</div>

	</form>
	
	</div><!-- /form-container -->
	
</div><!-- /wrapper -->



</body>
</html>
