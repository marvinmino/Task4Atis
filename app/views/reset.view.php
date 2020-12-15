<?php require('partials/head.php'); ?>
<link href="public/css/forgot.css" rel="stylesheet">
<div style="padding-bottom:10%;">
<div class="container padding-bottom-3x mb-2 mt-5">
	    <div class="row justify-content-center">
	        <div class="col-lg-8 col-md-10">
	            <div class="forgot">
	                <h2>Forgot your password?</h2>
	                <p>Change your password in three easy steps. This will help you to secure your password!</p>
	                <ol class="list-unstyled">
	                    <li><span class="text-primary text-medium">1. </span>Enter your email address below.</li>
	                    <li><span class="text-primary text-medium">2. </span>Our system will send you a temporary link</li>
	                    <li><span class="text-primary text-medium">3. </span>Use the link to reset your password</li>
	                </ol>
	            </div>
	            <form class="card mt-4" method="post" action="reset">
				<?php
        
          if (isset($_SESSION['error'])) {
          ?><div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
              <?php unset($_SESSION['error']);
            }  ?>
	                <div class="card-body">
	                    <div class="form-group"> <label for="email-for-pass">Enter your Password</label> 
                        <input class="form-control" type="password" name="password1" required="">
                        <label for="email-for-pass">Confirm Password</label>
                        <input class="form-control" type="password"  name="password2" required="">
                        <small class="form-text text-muted">This will be your new password</small> </div>
	                </div>
	                <div class="card-footer"> <button class="btn btn-success" type="submit">Get New Password</button>  </div>
	            </form>
	        </div>
	    </div>
	</div>
	</div>
    </body>
</html>