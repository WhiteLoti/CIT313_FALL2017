<?php include('views/elements/header.php');?>
<?php

if($bio != '')
{
    extract($bio);
    $name = ucfirst($first_name).' '.ucfirst($last_name);
}
if($blogs != '')
{
    extract($blogs);
}

?>

<div class="container">
   <div class="center round-frame border">
      <?php
         if((isset($profile_picture)) && ($profile_picture != ''))
         {
            echo '<img class="image" src="'.BASE_URL.'views/img/profile_pictures/'.$profile_picture.'">';
         }
         else
         {
            echo '<img class="image" src="'.BASE_URL.'views/img/profile_pictures/blank.png">';
        }
      ?>
   </div>
   <label id="btn_upload_picture" for="upload_picture" class="btn btn-secondary label-edit" type="button">Upload New Profile Picture</label>
   <form id="picture_form" action="">
       <input id="upload_picture" accept=".jpg,.jpeg,.png,.bit" type="file" name="file">
   </form>
<!--
<div class="container">
  <div>
      <?php 
         echo '<div class="center round-frame border">';
         if((isset($profile_picture)) && ($profile_picture != ''))
         {
             echo '<img class="image" src="'.BASE_URL.'views/img/profile_pictures/'.$profile_picture.'">';
         }
         else
         {
             echo '<img class="image" src="'.BASE_URL.'views/img/profile_pictures/blank.png">';
         }
         echo '</div>';
      ?>
      <h3 class="real center medium bold text-center"><?php echo $name ?></h3>
    </a>
  </div>
</div>
<table>
  <tr>
    <td class="medium bold text-center">
      <label for="about_me" type="button" class="btn btn-secondary">About Me</label>
    </td>
    <td class="medium bold text-center">
      <label for="education" type="button" class="btn btn-secondary">Education</label>
    </td>
    <td class="medium bold text-center">
      <label for="blogs" type="button" class="btn btn-secondary">Blogs</label>
    </td>
    <td class="medium bold text-center">
      <label for="contact" type="button" class="btn btn-secondary">Contact</label>
    </td>
  </tr>
  <tr>
    <td colspan="4"> <hr> </td>
  </tr>
  <tr>
    <td colspan="4">
      <input id="about_me" type="radio" name="profile" checked="checked">
      <div class="info">
        <?php
          echo 'Full Name: '.$name;
          if($biography != '')
          {
            echo $biography.'<br>';
          }
          if($interests != '')
          {
            echo $interests.'<br>';
          }
        ?>
      </div>
      <input id="education" type="radio" name="profile">
      <div class="info">
        <?php
          if($school != '')
          {
            echo 'School: '.$school.'<br>';
          }
          if($major != '')
          {
            echo 'Major: '.$major.'<br>';
          }
          if($concentration != '')
          {
            echo 'Concentration: '.$concentration.'<br>';
          }
          if($graduation != '')
          {
            echo 'Expected Graduation: '.$graduation.'<br>';
          }
        ?>
      </div>
      <input id="blogs" type="radio" name="profile">
      <div class="info">
        <?php
          if(is_array($blogs))
          {
             echo 'Blogs created by user: <br><br>';
             foreach($blogs as $blog)
             {?>
                <h3><a href="<?php echo BASE_URL?>blog/post/<?php echo $blog['pID'];?>" title="<?php echo $blog['title'];?>"><?php echo $blog['title'];?></a></h3>
                if(isset($blog['image
                <sub><?php echo $blog['date'] ?> by 
                <a href="<?php echo BASE_URL ?>/category/view/<?php echo $blog['categoryID'] ?>"><?php echo $p['name'] ?></a></sub>
       <?php }
          }
          else
          {
             echo 'User has no blog entries.';
          }
        ?>
      </div>
      <input id="contact" type="radio" name="profile">
      <div class="info">
        <?php
          if($email != '')
          {
            echo 'Email: <a href="mailto:'.$email.'">'.$email.'</a>';
          }
        ?>
      </div>
    </td>
  </tr>
</table>
-->
<?php include('views/elements/footer.php');?>
