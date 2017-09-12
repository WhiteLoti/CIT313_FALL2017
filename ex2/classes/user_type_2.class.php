<?php
// Nathan Thomas
// Professor Rob Dillon
// CIT 313 Commercial Web Development
// 9 / 12 / 20171

// Child Class Administrator
class usertype2 extends user
{

    // Administrator class constructor
    function __construct($user_level, $user_id)
    { 
        // Call parent constructor
        parent::__construct($user_level);

        // Set user_type for regular user
         $this->user_type = 2;

        // Set user_id property
        $this->user_id = $user_id;
    }

    // These __set accessors
    function __set($property_name, $property_value)
    {
        $this->$property_name = $property_value;  
    }

    // These __get accessors
    function __get($property_name)
    {
        return $this->$property_name;
    }

    // Destructor function destroys the object once it is finished being used
    function __destruct()
    {
    }

}

?>