<?php
 require 'partials/head.php'; 
?>
<br><br>
<main role="main">

    
  <div id="myCarousel" class="carousel slide" data-ride="carousel"style="height:600px">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <?php for($i=1;$i<sizeof($articles)+1;$i++):?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" class="active"></li>
        <?php endfor?>

    </ol>
    
    <div class="carousel-inner">
    <div class="carousel-item active">
        <img class="bd-placeholder-img" width="100%" height="600px" src="https://securitybrief.eu/uploads/story/2020/06/22/gamingggg.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></img>
        <div class="container">
          <div class="carousel-caption">
            <h1>Welcome to GamerFear</h1>
            <p></p>

          </div>
        </div>
      </div>
      <?php foreach($articles as $article):?>
      <div class="carousel-item">
        <a href="post/<?php echo $article->slug?>"><img class="bd-placeholder-img" width="100%" height="600px" src=<?php echo $article->thumbnail?> preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></img></a>
        <div class="container">
          <div class="carousel-caption text-left">
            <h1><?php echo $article->title?></h1>
            <p><?php echo substr($article->description,0,60)?></p>
          </div>
        </div>
      </div>
      <?php endforeach?>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <div class="album py-5 bg-dark text-dark">
    <div class="container">

      <div class="row">
      <?php foreach($articles as $article):?>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="<?php echo $article->thumbnail?>" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></img>
            <div class="card-body">
            <p class="card-text"><b><?php echo $article->title?></b></p>
              <p class="card-text"><?php echo substr($article->description,0,60)?>...</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="post/<?php echo $article->slug?>" class="btn btn-sm btn-outline-secondary">View</a>
                </div>
                <small class="text-muted"><?php echo $article->date?></small>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach?>
      </div>  
    </div>
  </div>

</main>

<body>
</html>
