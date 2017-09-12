<?php
// Nathan Thomas
// Professor Rob Dillon
// CIT 313 Commercial Web Development
// 9 / 12 / 2017

// Parent User Class
class user
{

    // These properties will be shared among child classes
    protected $user_id;
    protected $user_type;
    protected $first_name;
    protected $last_name;
    protected $email_address;
    protected $user_level;

    // Parent construct which is called from child classes
    function __construct($user_level)
    {
        $this->user_level = $user_level;
    }

    // These __set accessors
    function __set($property_name, $property_value)
    {
        $this->$property_name = $property_value;  
    }

    // These __get accessors
    function __get($property_name)
    {
        return $this->$property_value;
    }

    // Destructor function destroys the object once it is finished being used
    function __destruct()
    {
    }

}

?>