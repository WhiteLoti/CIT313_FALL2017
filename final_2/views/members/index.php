<?php include('views/elements/header.php'); ?>

<div class="container">
<div class="page-header">

<h1><?php echo $title; ?></h1>
</div>

    <?php foreach($users as $user){ ?>
        <p>Profile: <?php echo '<a href="'.BASE_URL.'aboutme?user='.$user['uID'].'">'.$user['first_name'].' '.$user['last_name']; ?></a></p>
        <p>Contact: <a href="mailto:<?php echo $user['email'];?>"><?php echo $user['email'];?></a></p>
    <?php } ?>

</div>

<?php include('views/elements/footer.php');?>