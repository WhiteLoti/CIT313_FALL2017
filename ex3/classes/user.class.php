<?php
// Nathan Thomas
// Professor Rob Dillon
// CIT 313 Commercial Web Development
// 9 / 18 / 2017

// Parent User Class
abstract class user
{

    // These properties will be shared among child classes
    protected $user_type;
    protected $first_name;
    protected $last_name;
    protected $email_address;
    protected $user_level;

    // Each child must implement a __construct method
    abstract function __construct($user_level,$user_id);

    // Each child must implement a __set method
    abstract function __set($property_name, $property_value);

    // Each child must implement a __get method
    abstract function __get($property_name);

    // Each child must implement a __destruct method
    abstract function __destruct();
}

?>