<?php include('views/elements/header.php');
   $u = new User();
   if(!$u->isAdmin())
   {
      header('Location: '.BASE_URL);
   }
?>

<div class="container">

<div class="page-header">
  <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
   <h1>Add Post</h1>
  </div>
  
  <div class="row">
      <div class="span8">
        <form action="<?php echo BASE_URL?>manageposts/<?php echo $task?>" method="post" onsubmit="editor.post()">
          <?php
             if($missing_title)
             {?>
                    <div class="alert alert-danger">
                       <button type="button" class="close" data-dismiss="alert">×</button>
    	                  <?php echo $missing_title ?>
                    </div>
             <?php }
          ?>
          <label>Title</label>
          <input type="text" class="span6" name="title" value="<?php echo $title?>">
          <?php
             if($missing_date)
             {
                    date_default_timezone_set('America/Indiana/Indianapolis');
 ?>
                    <div class="alert alert-danger">
                       <button type="button" class="close" data-dismiss="alert">×</button>
    	                  <?php echo $missing_date ?>
                    </div>
                    <label for="date">Date</label>
                    <input name="date" id="date" size="16" type="date">
             <?php } else
             {
          date_default_timezone_set('America/Indiana/Indianapolis');?>
          <label for="date">Date</label>
          <input name="date" id="date" size="16" type="date" value="<?php echo $date ?>">
             <?php }	  
             if($missing_category)
             {?>
                    <div class="alert alert-danger">
                       <button type="button" class="close" data-dismiss="alert">×</button>
    	                  <?php echo $missing_category ?>
                    </div>
             <?php } ?>     
          <label for="category">Category</label>
          <select class="input-sm" name="category" id="category">
<?php
            if($missing_category != 'undefined')
            {
              echo '<option selected value="'.$category['value'].'">Category Selected</option>';
            }
?>
          <option value="">-- Select Category --</option>
          <?php
            foreach($categories as $key){
              echo '<option value='.$key['categoryID'].'">'.$key['name'].'</option>';
	  }
          ?>
          
          </select>
          <?php
             if($missing_content)
             {?>
                    <div class="alert alert-danger">
                       <button type="button" class="close" data-dismiss="alert">×</button>
    	                  <?php echo $missing_content ?>
                    </div>
             <?php }
          ?> 
          <label>Content</label>
          <textarea id="tinyeditor" name="content" style="width:556px; height: 200px"><?php echo $content?></textarea>
    			<br/>
          <input type="hidden" name="uID" value="<?php echo $_SESSION['uID']; ?>"/>
          
          <button id="submit" type="submit" class="btn btn-primary" >Submit</button>
          <a href="<?php echo BASE_URL; ?>managecategories" class="btn">Manage Categories</a>
        </form>

        
      </div>
    </div>
</div>
<?php include('views/elements/footer.php');?>