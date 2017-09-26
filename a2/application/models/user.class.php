<?php
    // Nathan Thomas
    // Professor Rob Dillon
    // Date 9 / 26 / 2017
    // Assignment 2 : MVC Framework

    class User extends Model
    {
        // Implementation of the __construct method
        function __construct()
        {
          
        }

        // Implementation of the __set accessors
        function __set($property_name, $property_value)
        {
            $this->$property_name = $property_value;  
        }

        // Implementation of the__get accessors
        function __get($property_name)
        {
            return $this->$property_name;
        }

        // Implementation of the __destruct method
        function __destruct()
        {

        }

        // Implementation of the getName method
        function getName()
        {
            return array('userid'=>$this->__get('user_id'),
                         'firstname'=>$this->__get('first_name'),
                         'lastname'=>$this->__get('last_name'),
                         'email'=>$this->__get('email'),
                         'role'=>$this->__get('role'));
        }
    }

?>