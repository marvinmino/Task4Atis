<?php require('partials/head.php'); ?>




<div style="padding-bottom:20%;padding-left:30%;padding-right:30%">


        <form action="/register" method="post" style="background-color:rgba(0, 0, 0, 0.5);border-radius:1.2%;">
        <div style="padding:6%">
            <?php 
            if (isset($_SESSION['error'])) {
            ?><div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
            <?php unset($_SESSION['error']);
            }  ?>
            <div class="form-group position-relative" >
                <label for="email" style="padding-right:90%"><strong>Email</strong></label><br>
                <input class="form-control" placeholder="Email"  type="email" name="email">
            </div>
            <div class="form-group position-relative">
                <label for="password" style="padding-right:85%"><strong>Password</strong></label>
                <input class="form-control" type="password" placeholder="Password" name="password1">
            </div>
            <div class="form-group position-relative">
                <label for="password" style="padding-right:75%"><strong>Confirm Password</strong></label>
                <input class="form-control" type="password" placeholder="Confirm Password" name="password2">
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-lg btn-block"type="submit" value="Register" name='register_frm'>
            </div>
            <p>Already have an account? <a href="login">Log In</a></p>
            </div>
        </form>


</div>


<?php require('partials/footer.php'); ?>
