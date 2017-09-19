<?php
// Nathan Thomas
// Professor Rob Dillon
// CIT 313 Commercial Web Development
// 9 / 12 / 2017

// Child Class Regular User
class registereduser extends user
{

    // Regular User class constructor
    function __construct($user_level,$user_id)
    {
        // Set user_id property
        $this->user_level = $user_level;

        // Set user_level
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

    // Static Method
    static function doMath($number_1,$number_2)
    {
        if(is_numeric($number_1) && is_numeric($number_2))
        {
            return ($number_1 + $number_2) * $number_1;
        }
        else
        {
            return 'could not be calculated';
        }
    }

    // Destructor function destroys the object once it is finished being used
    function __destruct()
    {
    }

}

?>