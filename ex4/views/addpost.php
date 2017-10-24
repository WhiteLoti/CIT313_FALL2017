<?php include('elements/header.php');?>

<div class="container">
	<div class="page-header">
   <h1> the Add Post View </h1>
  </div>
  <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
  <div class="row">
      <div class="span8">
        <form action="<?php echo BASE_URL?>addpost/<?php echo $task?>" method="post" onsubmit="editor.post()">
          <label>Title</label>
          <input type="text" class="span6" name="post_title" value="<?php echo $title?>">
     			<label>Content</label>
          <textarea id="tinyeditor" name="post_content" style="width:556px;height: 200px"><?php echo $content?></textarea>
    			<br/>
          <input type="hidden" name="pID" value="<?php echo $pID?>"/>
          <input type="hidden" name="date" value="<?php $date = date('Y-m-d H:i:s'); echo $date; ?>"/>
          <select name="categoryID">
              <?php
                foreach($categories as $category)
                {
                    echo '<option value="'.$category['categoryID'].'">'.$category['name'].'</option>';
                }
              ?>
          </select>
          <button id="submit" type="submit" class="btn btn-primary" >Submit</button>
        </form>

        
      </div>
    </div>
</div>
<?php include('elements/footer.php');?>

