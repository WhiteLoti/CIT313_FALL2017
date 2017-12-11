<?php include('views/elements/header.php');?>
<?php
   $u = new User();
   if($u->isAdmin())
   {
      
   }
?>

<div class="container">
	<div class="page-header">
   <h1>Add Post</h1>
  </div>
  
  <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
  
  <div class="row">
      <div class="span8">
        <form action="<?php echo BASE_URL?>manageposts/<?php echo $task?>" method="post" onsubmit="editor.post()">
          <label>Title</label>
          <input type="text" class="span6" name="title" value="<?php echo $title?>" required="title">
     	  <input type="hidden" name="pID" value="<?php echo $pID?>">
          <label for="date">Date</label>
          <?php // set timezone
          date_default_timezone_set('America/Indiana/Indianapolis');?>
          <input name="date" id="date" size="16" type="date" value="<?php echo $date = date('Y-m-d H:i:s'); ?>">
          
          <label for="category">Category</label>
          <select class="input-sm" name="categoryID" id="category" required="category">
          <option value="">-- Select Category --</option>
          
          <?php
            foreach($categories as $key){
		echo "<option value='".$key['categoryID']."'>".$key['name']."</option>" . "\n";
            }
          ?>
          
          </select>
        
          <label>Content</label>
          <textarea class="tinyeditors" name="content" style="width:556px;height: 200px"><?php echo $content?></textarea>
          <input type="hidden" name="uID" value="<?php echo $_SESSION['uID']; ?>"/>
          <br>
          <button id="submit" type="submit" class="btn btn-primary" >Edit</button>
          <a href="<?php echo BASE_URL; ?>manageposts/delete_post" class="btn post_removal">Remove Post</a>
          <a href="<?php echo BASE_URL; ?>blog/post/<?php echo $pID; ?>" class="btn">View</a>
          <a href="<?php echo BASE_URL; ?>managecategories" class="btn">Manage Categories</a>
        </form>

        
      </div>
  </div>
</div>
<?php include('views/elements/footer.php');?>