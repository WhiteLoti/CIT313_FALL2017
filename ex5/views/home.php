<?php include('elements/header.php');?>
<div class="container">
	<div class="page-header">
    <?php
        if(isset($_GET['action']) && $_GET['action'] == 'loggedout')
        {
    ?>
           <div class="alert alert-success">
               <button type="button" class="close" data-dismiss="alert">�</button>
                   Successfully logged out
           </div>
    <?php } ?>
    <h1> Hello From the View </h1>
  </div>
</div>
<?php include('elements/footer.php');?>
