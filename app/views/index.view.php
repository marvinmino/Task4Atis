<?php require 'partials/head.php'; ?>
<?php 
            if (isset($_SESSION['message'])) {
                ?><div class="alert alert-success"><?php echo $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']);
            }  ?>
  <main role="main" class="inner cover" >
  
    <h1 class="cover-heading">Conquer your fears</h1>
    <p class="lead">GamerFear is a gaming blog that brings you the latest and greatest news from the world of gaming. </p>
    <p class="lead">
      <a href="articles" class="btn btn-lg btn-secondary">Learn more</a>
    </p>
  </main>

  <footer class="mastfoot mt-auto">
    <div class="inner">
      <p>Gamers <a href="home">for Gamers</p>
    </div>
  </footer>
</div>
</body>
</html>
