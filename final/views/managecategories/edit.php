<?php include('views/elements/header.php');?>
<?php extract($outcome); ?>
<div class="container">
	<div class="page-header">
  </div>
  
  <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
  
  <div class="row">
      <div class="span8">
         <form action="<?php echo BASE_URL.'managecategories/save/'.$categoryID; ?>" method="POST">
            <input type="text" name="categoryName" value="<?php echo $name; ?>">
            <input type="hidden" name="categoryID" value="<?php echo $categoryID; ?>"><br>
            <a class="btn" href="<?php echo BASE_URL; ?>managecategories">Go Back To Categories</a>
            <button class="btn" type="submit">Edit Category</button>
         </form>
      </div>
    </div>
</div>
<?php include('views/elements/footer.php');?>