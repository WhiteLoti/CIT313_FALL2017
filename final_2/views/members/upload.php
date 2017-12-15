<?php

   // change temporary directory to allow for getimagesize
   putenv('upload_tmp_dir='.BASE_URL.'views/img/tmp');
   putenv('TMPDIR='.BASE_URL.'views/img/tmp');
   //echo 'System Temp Directory '.sys_get_temp_dir();
   ini_set('upload_tmp_dir',BASE_URL.'views/img/tmp');
   echo ini_get('upload_tmp_dir');
   //$image = $_FILES['file'];
   //move_uploaded_file($image['tmp_name'],BASE_URL.'views/img/profile_pictures/test-'.time().'.png');
   //print_r($form_data);
   //print_r(getimagesize($form_data['tmp_name']));
   //echo BASE_URL.'views/img/profile_pictures/test.png';
   //move_uploaded_file($_POST,BASE_URL.'views/img/profile_pictures/test.png');
?>