<?php

// Nathan Thomas
// Professor Rob
// 9 / 2 / 2017
// Exercise 1: PHP Review

ini_set('display_errors',0);
error_reporting(0);

// Header include
include('../header.php');
// Footer include
include('../footer.php');

$user = array('name'=>'Nathan Thomas',
              'favorite_color'=>'Black',
              'favorite_movie'=>'The Girl In The Sun',
	      'favorite_book'=>'The House of The Scorpion',
              'favorite_website'=>'https://stackoverflow.com/');

function createList($array)
{
  $list = '';
  foreach($array as $key => $value)
  {
     if($key === 'name')
     {
        continue;
     }
     $list .= "<li>{$value}</li>";
  }
  return $list;
}

$list = createList($user);
			  
$page =<<<HTML
<DOCTYPE html>
<html>
  <head>
     
  </head>
  {$header}
  <body>
    <h1>{$user['name']}</h1>
	<ul>
	  {$list}
	</ul>
  </body>
  {$footer}
</html>
HTML;

echo $page;

?>