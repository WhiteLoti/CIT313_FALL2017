<?php
    // Nathan Thomas
    // Professor Rob Dillon
    // Date 9 / 26 / 2017
    // Assignment 2 : MVC Framework

    function classLoader($class_name)
    {
        // DRY code
        $class_name = strtolower($class_name);

        if(file_exists(__DIR__.'/'.$class_name.'.class.php'))
        {
            require_once(__DIR__.'/'.$class_name.'.class.php');
        }
        else if(file_exists(__DIR__.'/controllers/'.$class_name.'.class.php'))
        {
            require_once(__DIR__.'/controllers/'.$class_name.'.class.php');
        }
        else if(file_exists(__DIR__.'/models/'.$class_name.'.class.php'))
        {
            require_once(__DIR__.'/models/'.$class_name.'.class.php');
        }
    }

    spl_autoload_register('classLoader');

    new Controller();
?>