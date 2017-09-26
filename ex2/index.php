<?php
// Nathan Thomas
// Professor Rob Dillon
// CIT 313 Commercial Web Development
// 9 / 12 / 2017

// Includes the User class
include_once('./classes/user.class.php');
// Includes the UserType1 class
include_once('./classes/user_type_1.class.php');
// Includes the UserType2 class
include_once('./classes/user_type_2.class.php');

// Create a regular user object
$regular_user = new usertype1('Regular User','nguyentho');
$regular_user->__set('first_name','Thoi');
$regular_user->__set('last_name','Nguyen');
$regular_user->__set('email_address','nguyenthoi@iupui.edu');

// Create a administrator object
$admin = new usertype2('Administrator','thomanat');
$admin->__set('first_name','Nathan');
$admin->__set('last_name','Thomas');
$admin->__set('email_address','thomanat@iupui.edu');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>CIT313 - Fall 2017 Exercise 2</title>
</head>

<body>
<?php

    echo 'User Level: '.$regular_user->__get('user_level').'<br>';
    echo 'Registered User ID: '.$regular_user->__get('user_id').'<br>';
    echo 'Registered User Type: '.$regular_user->__get('user_type').'<br>';
    echo 'Registered First Name: '.$regular_user->__get('first_name').'<br>';
    echo 'Registered Last Name: '.$regular_user->__get('last_name').'<br>';
    echo 'Registered Email: '.$regular_user->__get('email_address').'<br>';
    echo '<hr/>';
    echo 'User Level: '.$admin->__get('user_level').'<br>';
    echo 'Admin User ID: '.$admin->__get('user_id').'<br>';
    echo 'Admin User Type: '.$admin->__get('user_type').'<br>';
    echo 'Admin First Name: '.$admin->__get('first_name').'<br>';
    echo 'Admin Last Name: '.$admin->__get('last_name').'<br>';
    echo 'Admin Email: '.$admin->__get('email_address').'<br>';

?>
</body>
</html>