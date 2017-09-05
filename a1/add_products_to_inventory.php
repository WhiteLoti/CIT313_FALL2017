<?php

	//this page will accept the information from the inventory form and create an object for each inventory item.  Once the object is created, it is added to an inventory array stored in Session
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
<title>I've Got A Lovely Bunch of Coconuts: Inventory</title>
<link type="text/css" rel="stylesheet" href="<?php echo URL_ROOT . '/styles.css' ?>" />
</head>

<body>

<?php

//unset the current product array in session and start fresh
unset($_SESSION['aryProductArray']);

$aryProductArray = array();

//loop through the 8 sets of fields on the initial form to process all of the products

for ($x=0; $x<=7; $x++) {
	
	//first, see if the product's name has been set.  If not, skip processing this product.
	if (!empty($_POST['productname' . $x]))  {
		
		//produce item's name is not empty, so process this item
		
		
		
		$thisProductName = $_POST['productname' . $x];
		$thisProduceType = $_POST['producetype' . $x];
		$thisProductPriceType = $_POST['pricetype' . $x];
		$thisProductPrice = $_POST['productprice' . $x];
		
		echo "Added " . $thisProductName . "<br />";
		
		//create an empty produceItem variable
		$produceItem;
		
		switch ($thisProduceType) {
			case "f": //fruit
				//create fruit object
				$produceItem = new fruit($x, $thisProductName, $thisProductPriceType, $thisProductPrice);
				$typeType = "Fruit";
				break;
			case "v": //veg
				//create veggie object
                                // Error: misspelled variable $_$thisProductName. Rename variable $_thisProductName to $thisProductName.
				$produceItem = new veggie($x, $thisProductName, $thisProductPriceType, $thisProductPrice);
				$typeType = "Veggie";
				break;
		}
		
		if($produceItem->price_type == 2) {
            // Error: Missing semi-colon after assignment statement 
			$pType = "Each";
		}
		else {
			$pType = "Per Lb";
		}
		
		echo "Product ID: " . $produceItem->product_id . "<br />";
		echo "Product Name: " . $produceItem->product_name . "<br />";
		echo "Product Type: ". $typeType . "<br />";
		echo "Product Price: $". $produceItem->product_price . " ".$pType."<br /><hr/>";
		
		//add object to the array	
		array_push($aryProductArray, $produceItem);
		
	}
	else {
		//stop the loop at the first empty product name
		break;	
	}
	
}

//if the array is not empty, put it into the Session
$_SESSION['aryProductArray'] = serialize($aryProductArray);
session_write_close();

//links
?>
<p>
<a href="view_products.php">View your Produce Store</a><br /><br />
<a href="index.php">Go back to Inventory input screen (this will reset your current inventory)</a><br />
</p>

<body>
</body>
</html>