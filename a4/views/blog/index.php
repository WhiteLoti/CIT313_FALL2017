
<?php include('views/elements/header.php');?>

<div class="container">
<div class="page-header">
<h1><?php echo $title;?></h1>
  </div>
	<?php foreach($posts as $p){?>
    <h3><a href="<?php echo BASE_URL?>blog/post/<?php echo $p['pID'];?>" title="<?php echo $p['title'];?>"><?php echo $p['title'];?></a></h3>
    <div><?php echo $p['date'] ?> by 
    <a href="<?php echo BASE_URL ?>"><?php echo $p['first_name'].' '.$p['last_name'] ?></a> in 
    <a href="<?php echo BASE_URL ?>/category/view/<?php echo $p['categoryID'] ?>"><?php echo $p['name'] ?></a></div>
    <div style="margin-top:15px;"><a href="<?php echo BASE_URL ?>ajax/get_post_content/?pID=<?php echo $p['pID'] ;?>" class="btn post-loader">View entire post</a></div>
<?php }?>
</div>


<?php include('views/elements/footer.php');?>