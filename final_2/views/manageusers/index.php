<?php include('views/elements/header.php');?>
<?php
   $u = new User();
   if(!$u->isAdmin())
   {
      header('Location: '.BASE_URL);
   }
?>
<div class="container">
	<div class="page-header">
   <h1>Users Waiting Approval</h1>
  </div>

<div id="message">
</div>

<form>
<table>
<?php foreach($users as &$user)
{ ?>
      <tr>
        <input type="hidden" name="uID" value="<?php echo $user['uID']; ?>">
        <td>User: <?php echo $user['first_name'].' '.$user['last_name']; ?></td>
        <?php
          // is admin
          if($user['user_type'] == '1')
          { ?>
             <td colspan="2"><div class="unselectable">Administrator</div></td>
          <?php }
          // regular user
          else
          {
             // already active
             if($user['active'] == 1)
             { ?>
                <td><div class="approved">User Activated</div></td>
                <td><a href="<?php echo BASE_URL; ?>manageusers/delete" class="btn btn-secondary action-btn">Delete User</a></td>
             <?php }
             else
             { ?>
                <td><a href="<?php echo BASE_URL; ?>manageusers/approve" class="waiting action-btn">Approve User</a></td>
                <td><a href="<?php echo BASE_URL; ?>manageusers/delete" class="btn btn-secondary action-btn">Delete User</a></td>
             <?php }
          }
        ?>
      </tr>
<?php } ?>
</table>
</form>
<!--
  <div class="row">
      <div class="span8">      
<a href="<?php echo BASE_URL; ?>manageposts/add" class="btn btn-secondary">Add A Post</a>
<a href="<?php echo BASE_URL; ?>managecategories" class="btn btn-secondary">Manage Categories</a>

      </div>
    </div>
-->
</div>
<?php include('views/elements/footer.php');?>