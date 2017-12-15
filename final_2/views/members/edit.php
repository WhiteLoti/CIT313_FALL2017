<?php include('views/elements/header.php'); ?>
<?php
   $u = new User();
   if(!$u->isAdmin())
   {
      header('Location: '.BASE_URL);
   }
   if(is_array($user))
   {
       extract($user);
   }
?>
<form action="<?php echo BASE_URL; ?>members/<?php echo $task; ?>" method="POST">
    <table>
        <?php
        if($message) 
        {
             echo '<tr><td colspan="2">'.$message.'</td></tr>';
        }
        ?>
        <tr>
            <td>First Name: <input name="first_name" type="text" value="<?php echo $first_name ?>" /></td>
            <td> Last Name: <input name="last_name" type="text" value="<?php echo $last_name ?>" /></td>
        </tr>
        <tr>
            <td>Enter A Password: <input name="password" type="password" /></td>
            <td> Verify Password: <input name="re-password" type="password" /></td>
        </tr>
        <tr>
            <td>Email: <input name="email" type="text" value="<?php echo $email ?>" /></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Update Profile" /></td>
        </tr>
    </table>
    <input type="hidden" name="uID" value="<?php echo $_SESSION['uID'] ?>">
</form>
<?php include('views/elements/footer.php');?>