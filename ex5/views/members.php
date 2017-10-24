<?php include('elements/header.php'); ?>
<?php 
if(is_array($user)) {
    extract($user);
    echo '<table><tr><td>Name</td><td>Email</td></tr>';
    echo '<tr><td><a href="'.BASE_URL.'members/view/'.$user['uID'].'">'.$user['first_name'].' '.$user['last_name'].'</a></td><td>'.$user['email'].'</tr>';
}?>

<?php
if(is_array($users))
{
    echo '<table><tr><td>Name</td><td>Email</td></tr>';
    foreach($users as $user)
    {
        echo '<tr><td><a href="'.BASE_URL.'members/view/'.$user['uID'].'">'.$user['first_name'].' '.$user['last_name'].'</a></td><td>'.$user['email'].'</td></tr>';
    }
    echo '</table>';
}
?>
<?php include('elements/footer.php');?>