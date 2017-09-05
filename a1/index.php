<?php
	include_once('webconfig.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>I've Got A Lovely Bunch of Coconuts: Create Inventory</title>
<link type="text/css" rel="stylesheet" href="<?php echo URL_ROOT . '/styles.css' ?>" />
</head>

<body>



<div id="wrapper">

	<h2>To begin setting up your produce stand, input the products that you would like to offer.</h2>

	<div class="form-container">
    <!-- Error: PHP constants should not be in quotations marks. Remove quotation marks from URL_ROOT -->
	<form action="<?php echo URL_ROOT . '/add_products_to_inventory.php' ?>" method="post">
    
    <?php
		//create a loop that writes a form to allow up to 8 produce items to be added
	
		for ($x = 0; $x <= 7; $x++) {
	?>
    <fieldset>
		<legend>Product Details: Product <?php echo $x ?></legend>
			<div><label for="productname<?php echo $x ?>">Product Name</label> <input id="productname<?php echo $x ?>" type="text" name="productname<?php echo $x ?>" value="" /></div>
			
			<div>
				<label for="producetype<?php echo $x ?>">Produce Type</label>
				<select id="producetype<?php echo $x ?>" name="producetype<?php echo $x ?>">
					<optgroup label="Type of Produce">
						<option value="f">Fruit</option>
						<option value="v">Vegetable</option>
					</optgroup>
				</select>
			</div>
            
            <div>
				<label for="pricetype<?php echo $x ?>">Pricing Type</label>
				<select id="pricetype<?php echo $x ?>" name="pricetype<?php echo $x ?>">
					<optgroup label="Pricing Structure">
						<option value="1">Per pound</option>
						<option value="2">Each</option>
					</optgroup>
				</select>
			</div>
            
			<div><label for="productprice<?php echo $x ?>">Product Price</label> $<input id="productprice<?php echo $x ?>" name="productprice<?php echo $x ?>" type="text" size="10" /></div>
	</fieldset>
        <!-- Error: The end of the PHP for-loop should be a curly bracket. Replaced round bracket with curly -->
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
