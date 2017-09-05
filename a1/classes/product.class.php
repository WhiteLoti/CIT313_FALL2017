<?php

class product {
	
	protected $product_id;
	protected $product_name;
	protected $price_type;
	protected $product_price;
	
	function __construct($product_id) 
		{
			$this->product_id = $product_id;
		}
	
	function __get($variablename)
		{
			return $this->$variablename;
		}
	
	function __set($variablename, $variablevalue)
		{
			$this->$variablename = $variablevalue;
		}
	
	function __destruct()
		{
		}
	
	
}

?>