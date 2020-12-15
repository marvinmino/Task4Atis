
<?php require 'partials/head.php'; ?>

<div style="padding-bottom:20%;padding-left:30%;padding-right:30%">
   
     <form action="login" method="post" style="background-color:rgba(0, 0, 0, 0.5);border-radius:1.2%;">
     <div style="padding:6%">
        <?php

          if (isset($_SESSION['error'])) {
          ?><div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
              <?php unset($_SESSION['error']);
            }  ?>
            <div class="form-group">
                <label for="email"><strong>Email</strong></label>
                <input class="form-control" placeholder="Email" type="email" name="email">
            </div>
            <div class="form-group">
                 <label for="password" ><strong>Password</strong></label>
                 <input class="form-control" type="password" placeholder="Password" name="password1">
                  </div>
            <div class="form-group">
                <input style="float:left"type="submit" class="btn btn-primary btn-lg btn-block"value="Login" name='login_frm'>
                <span style="float:right">
                <input type="checkbox" name="remember">
                <p  style="float:left;">Remember me  &nbsp</p>
               </span>
                <br>
                <br>
                <br>
        </div>
            <p>Don't have an account? <a href="/register">Register</a></p>
            <p><a href='forgot'>Forgot password?</a></p>
            </div>
        </form>

</div>
<?php require 'partials/footer.php'; ?>
