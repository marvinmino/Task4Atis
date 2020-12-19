<?php require 'partials/head.php'; ?>
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
<form action="comment" method="post"></form>
<textarea name="" id="" cols="30" rows="10" placeholder="Leave your comment here" class="form-control"></textarea>
<input type="text" name="articleId" hidden value="<?php echo $article->id?>">
<input type="button" class="btn btn-dark btn-block" value="Comment">
</form>
<div class="container p-3 my-3  text-white" style="background-color:rgba(255, 255, 255, 0.5);border-radius:1.2%;">
<h6>Comments</h6>

<?php if (isset($_SESSION['message'])) {
                            ?><div class="alert alert-secondary" style="align-self:center;"><?php echo $_SESSION['message']; ?></div>
                        <?php unset($_SESSION['message']);
                        }  ?>
<div>
<?php foreach($comments as $comment):?>
<h6><?php echo explode('@',$comment->user)[1]?></h6>
<br>
<div style="text-align:left">
    <?php echo $comment->text?>
</div>
<?php endforeach?>
</div>
</div>
<?php require('partials/footer.php'); ?>