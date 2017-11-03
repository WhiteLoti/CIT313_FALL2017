<?php include('views/elements/header.php');?>
<div class="container">
	<div class="page-header">
   <h1>Login</h1>
   <?php if(isset($error)) { ?>
       <div class="alert alert-danger">
           <?php echo $error; ?>
       </div>
   <?php } ?>

   <form action="<?php echo BASE_URL; ?>login/do_login" method="POST">
       <table>
            <tr>
                <td>Username / Email Address: <input id="email" name="email" type="text" /></td>
                <td>                Password: <input id="password" name="password" type="password" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Login" /></td>
            </tr>
        </table>
    </form>
  </div>
</div>
<?php include('views/elements/footer.php');?>

