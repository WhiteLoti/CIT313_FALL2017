<?php
include('views/elements/header.php');
?>
<form action="<?php echo BASE_URL; ?>register/add" method="POST">
    <table>
        <?php
        if($message) 
        {
             echo '<tr><td colspan="2">'.$message.'</td></tr>';
        }
        ?>
        <tr>
            <td>First Name: <input name="first_name" type="text" /></td>
            <td> Last Name: <input name="last_name" type="text" /></td>
        </tr>
        <tr>
            <td>Enter A Password: <input name="password" type="password" /></td>
            <td> Verify Password: <input name="re-password" type="password" /></td>
        </tr>
        <tr>
            <td>Email: <input name="email" type="text" /></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Register" /></td>
        </tr>
    </table>
</form>
<?php include('views/elements/footer.php');?>