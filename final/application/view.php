<?php

class View {
   function load($folder, $file_name, $data = null ) 
   {
      if( is_array($data) ) {
         extract($data);
      }

      $u = new User();   

      include 'views/'.$folder.'/'. $file_name.'.php';
   }
}



