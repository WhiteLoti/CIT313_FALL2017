<?php include('views/elements/header.php');?>
<div class="container">
	<div class="page-header">
        <h1>Latest News from <?php echo $rss_title ?></h1>
    <?php
        if(isset($_GET['action']) && $_GET['action'] == 'loggedout')
        {
    ?>
           <div class="alert alert-success">
               <button type="button" class="close" data-dismiss="alert">×</button>
                   Successfully logged out
           </div>
    <?php } ?>
    <?php
       foreach($feed_data as $item)
       {
          echo '<h4><a href="'.$item['link'].'">'.$item['title'].'</a></h4>';
          echo '<p>'.$item['description'].'</p>';
          $datetime = new DateTime($item['pubDate']);
          echo '<sub>Published: '.$datetime->format('l \t\h\e n, Y \a\t g:iA').'</sub>';
          echo '<hr>';
       }
    ?>
  </div>
</div>
<?php include('views/elements/footer.php');?>