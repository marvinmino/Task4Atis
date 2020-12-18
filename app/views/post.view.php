<?php require 'partials/head.php'; ?>
<?php if($_SESSION['user_role']=='admin')
    echo '<a href="editArticle?slug='.$_SESSION['slug'].'">Edit Article </a>'
?>
<div class="container p-3 my-3  text-white" style="background-color:rgba(0, 0, 0, 0.5);border-radius:1.2%;">
<br>
<div><h2 style="float:left"><?php echo $article->title?></h2>
<i style="float:right"><?php echo $article->status?></i>
</div>
<br>
<br>
<hr>
<p><i><?php echo $article->description?></i></p>
<img src="<?php echo $article->image?>" alt="hoho" style="width:100%">
<div><?php echo $article->content?></div>
</div>
<div class="container p-3 my-3  text-white">

</div>
<?php require('partials/footer.php'); ?>