<?php include('elements/header.php');?>
<div class="container">
	<div class="page-header">
   <h1> the Login View </h1>
   <?php echo $numbers ?>
   <form action="<?php echo BASE_URL; ?>login/do_login" method="POST">
       <table>
            <tr>
                <td>Username: <input name="username" type="text" /></td>
                <td>Password: <input name="password" type="password" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Login" /></td>
            </tr>
        </table>
    </form>
  </div>
</div>
<?php include('elements/footer.php');?>

