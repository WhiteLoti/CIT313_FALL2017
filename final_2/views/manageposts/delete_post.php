<?php include('views/elements/header.php');
   $u = new User();
   if(!$u->isAdmin())
   {
      header('Location: '.BASE_URL);
   }
?>
<div class="container">
	<div class="page-header">
  </div>
  
  <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">�</button>
    	Post Deleted
    </div>
  <?php }?>
  
  <div class="row">
      <div class="span8">
        
<a href="<?php echo BASE_URL; ?>manageposts/add" class="btn btn-primary">Add A Post</a>

      </div>
    </div>
</div>
<?php include('views/elements/footer.php');?>