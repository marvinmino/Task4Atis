
    <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" >
    <meta name="generator" content="Jekyll v4.1.1">
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
