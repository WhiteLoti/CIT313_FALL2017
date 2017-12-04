
<?php include('views/elements/header.php');?>
<?php 
if( is_array($post) ) {
	extract($post);
}
?>

<div class="container">
	<div class="page-header">

<h1><?php echo $title;?></h1>
  </div>
<p><?php echo $content;?></p>
<sub><?php echo 'Posted on '.date('F j, Y \a\t H:i:s A', strtotime($date)).' by <a href="'.BASE_URL.'members/view/'.$uID.'">'.$first_name.' '.$last_name.'</a>'; ?><br>
</sub><br>
<?php
   if($comment_count > 1)
   {
      $comments = 'comments';
   }
   else
   {
      $comments = 'comment';
   }
?>
<div id="comments">
<?php

   if($comment_count > 0)
   {
      echo '<a id="load_comments" class="btn post-loader" href="'.BASE_URL.'ajax/get_comments?pid='.$pID.'">Load '.$comment_count.' '.$comments.'</a><br>';
   }
   else
   {
      echo '<div id="load_comments">No comments exists on post</div>';
   }

?>
</div>
<div></div><br>
<?php
    if(isset($_SESSION['uID']) && is_numeric($u->uID))
    {
       $form = '<form id="comment_form" action="'.BASE_URL.'ajax/post_comment">';
       $form .= '<textarea resize="none" name="comment">Write A Comment</textarea><br>';
       $form .= '<input type="hidden" name="uid" value="'.$u->uID.'">';
       $form .= '<input type="hidden" name="pid" value="'.$pID.'">';
       $form .= '<button type="submit" class="btn form">Submit Comment</button>';
       $form .= '</form>';

       echo $form;
    }
    else
    {
       echo '<a class="btn" href="'.BASE_URL.'login">Login to comment</a>';
    }
?>
</div>

<?php include('views/elements/footer.php');?>