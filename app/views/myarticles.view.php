<?php
 require 'partials/head.php'; 
?>
<br><br>
<main role="main">

    
<h2>My articles</h2>
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
