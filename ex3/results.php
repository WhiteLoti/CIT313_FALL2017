<?php
// Nathan Thomas
// Professor Rob Dillon
// CIT 313 Commercial Web Development
// 9 / 18 / 2017

// Create autoload function
function classLoader($class_name)
{
    include_once('classes/'.strtolower($class_name).'.class.php');
}

spl_autoload_register('classLoader');

// Autoload the RegisteredUser class
$registered_user = new RegisteredUser('newuser','regular');
$registered_user->__set('first_name',$_POST["fname"]);
$registered_user->__set('last_name',$_POST["lname"]);
$registered_user->__set('email_address',$_POST["email"]);

?>

<!DOCTYPE html>
<html>
<head>
    <title>CIT313 - Fall 2017 - Exercise 3 Results - Nathan Thomas</title>
</head>
<body>
The registered user's first name is: <?php echo $registered_user->__get('first_name'); ?><br/>
The registered user's last name is: <?php echo $registered_user->__get('last_name'); ?><br/>
The registered user's email address is: <?echo $registered_user->__get('email_address'); ?><br/>

<hr/>Processing Complete<br/>
	
</body>
</html>