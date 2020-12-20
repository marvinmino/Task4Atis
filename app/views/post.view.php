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

<textarea name="comment" id="" cols="30" rows="10" placeholder="Leave your comment here" name="comment"class="commenttext form-control"></textarea>
<input type="text" name="articleId" hidden class="articleId" id="<?php echo $article->id?>">
<a href="#" class="comment btn btn-block btn-primary">Comment</a>
<div class="container p-3 my-3  text-white" style="background-color:rgba(255, 255, 255, 0.5);border-radius:1.2%;">
<h6>Comments</h6>

<?php if (isset($_SESSION['message'])) {
                            ?><div class="alert alert-primary" style="align-self:center;"><?php echo $_SESSION['message']; ?></div>
                        <?php unset($_SESSION['message']);
                        }  ?>
<div style="color:black">
<?php foreach($comments as $comment):?>
<div class="hide<?php echo $comment->id?>">
<h6 style="text-align:left"><b><?php echo explode('@',$comment->user)[0]?></b></h6>
<?php if($comment->user==$_SESSION['email']):?>
<div style="text-align:right">
    <div class="article" id="<?php echo $article->slug?>"></div>
    <a id='<?php echo $comment->id?>'  href="#" style="font-size:15px;color:blue;" class="cat">Edit </a>| 
    <a id='<?php echo $comment->id?>' class="delete" href="#" style="font-size:15px;color:red;" >Delete</a></td>
</div>
<?php endif?>
<br>

<div style="text-align:left">
<p class="show<?php echo $comment->id?>" id="<?php echo $comment->id?>" style="align:center"><?php echo $comment->text ?></p>  
<div class="edit edit<?php echo $comment->id?>">
<input type="text" class="in<?php echo $comment->id?>" id="<?php echo $comment->id?>"value="<?php echo $comment->text?>">
<a href="#" class="go" id="<?php echo $comment->id?>" style="font-size:15px;color:red;">-></a>
</div>
</div>
<hr>
</div>
<?php endforeach?>
</div>
</div>
<script src="../public/js/comments.js" type="text/javascript"></script>
<?php require('partials/footer.php'); ?>