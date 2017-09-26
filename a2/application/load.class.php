<?php
    // Nathan Thomas
    // Professor Rob Dillon
    // Date 9 / 26 / 2017
    // Assignment 2 : MVC Framework

    class Load
    {
        function view($file_name,$data)
        {
            if(is_array($data))
            {
                extract($data);
            }

            include(__DIR__.'/../views/'.$file_name);
        }
    }

?>