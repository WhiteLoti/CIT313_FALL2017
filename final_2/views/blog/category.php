<?php include('views/elements/header.php');?>

<div class="container">
<div class="page-header"><h1>Posts from <?php echo $categoryName['name']; ?> category</h1></div>
<?php
    foreach($posts as $post)
{
echo '<h3><a href="'.BASE_URL.'blog/post/'.$post['pID'].'" title="'.$post['title'].'">'.$post['title'].'</a></h3>';
echo '<p>'.$post['content'].'</p>';
echo '<sub>'.date('F d Y H:i:s',strtotime($post['date'])).' by '; 
echo '<a href="'.BASE_URL.'">'.$post['first_name'].' '.$post['last_name'].'</a> in'; 
echo '<a href="'.BASE_URL.'blog/category/'.$post['categoryID'].'"> '.$post['name'].'</a></sub>';
} ?>
</div>

<?php include('views/elements/footer.php');?>