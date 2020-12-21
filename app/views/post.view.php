
    <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name = "keywords" content = "<?php foreach($tags as $tag) echo $tag->name.","?>" >
    <meta name="description" content="<?php echo $article->description.","?>">
    <meta name="revised" content="<?php echo $article->date?>">
    <meta name = "author"  content="<?php echo $article->date?>">
    <title>GamerFear</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../public/css/style.css" rel="stylesheet">
  </head>
  <body class="text-center" >
  <!-- <script src="../public/js/main.js"></script> -->
    <div class=" d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">Gamer Fear</h3>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link active" href="../home">Home</a>
        <?php
        session_start();
           if ($_SESSION['user_role']=='admin') {
            echo '<a class="nav-link" href="../category">Categories</a>';
            echo '<a class="nav-link" href="../allarticles">All Articles</a>';
           }
    ?>
        <?php

    if (isset($_SESSION['email'])) {
      echo '<a class="nav-link" href="../profile" >Profile</a>';
        echo '<a class="nav-link" href="../logout" >Logout</a>';
    }
    else
    echo '<a class="nav-link" href="../login" >Login</a>';
    ?>

      </nav>
    </div>
  </header>

<div class="container p-3 my-3  text-white" style="background-color:rgba(0, 0, 0, 0.5);border-radius:1.2%;">
<br>
<div><h2 style="float:left"><?php echo $article->title?></h2>
<?php if($article->is_featured==0&&$_SESSION['user_role']=='admin')
echo '<i style="float:right"><a style="color:blue" href="../featured?id='.$article->id.'">Make featured</a></i>';
 else if($article->is_featured==1&&$_SESSION['user_role']=='admin')
 echo '<i style="float:right"><a style="color:blue" href="../featured?id='.$article->id.'">Remove featured</a></i>';
 else
echo '<i style="float:right">'.$article->status.'</i>';
?>

</div>
<br>
<br>
<hr>
<p><i><?php echo $article->description?></i></p>
<?php foreach($tags as $tag):?>
<a href="../tags?tag=<?php echo $tag->name?>" style="color:cyan">#<?php echo $tag->name?> </a>
    <?php endforeach?>
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