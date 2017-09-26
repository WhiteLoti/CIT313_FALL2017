<?php
    // Nathan Thomas
    // Professor Rob Dillon
    // Date 9 / 26 / 2017
    // Assignment 2 : MVC Framework

    abstract class Model
    {
        protected $user_id;
        protected $first_name;
        protected $last_name;
        protected $email;
        protected $role;

        // All methods are signatures which have the child class implement them
        // Will visit again
        abstract function __construct();
        abstract function __set($property_name, $property_value);
        abstract function __get($property_name);
        abstract function __destruct();
    }

?>