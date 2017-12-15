<?php include('views/elements/header.php');?>

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
         <?php
            foreach($outcome as $category)
            {
               echo $category['name'].' <a href="'.BASE_URL.'managecategories/edit/'.$category['categoryID'].'">Edit</a><br>';
            }
         ?>
      </div>
    </div>
    <br>
    <form action="<?php echo BASE_URL.'managecategories/add'; ?>" method="POST">
        Add Category Name<br>
        <input type="text" name="categoryName"><br>
        <button type="submit" class="btn">Add Category</button>
    </form>
</div>
<?php include('views/elements/footer.php');?>