<?php require('partials/head.php'); ?>
<link rel="stylesheet" type="text/css" href="public/css/profile.css">
<div class="container main-section" style="align-self:center;padding-bottom:13%;">
		<div class="row">
			<div class="offset-md-1 col-lg-10 " style="background-color:rgba(0, 0, 0, 0.5);border-radius:1.2%; ">
				<div class="row">
					<div class="col-lg-12 text-right p-2">
						<i class="fa fa-list" aria-hidden="true"></i>
					</div>
					<div class="col-lg-12 card-img text-center p-2">
						<img  src="https://images.alphacoders.com/937/thumb-350-937101.png" class="rounded-circle">
                        <div class="badge badge-pill badge-danger p-12"><a href="changeProfile">New +</a></div>
                    </div>
                    
					<div class="col-lg-12 text-center card-detail pt-3 pb-5">
                    <?php 
                        if (isset($_SESSION['message'])) {
                            ?><div class="alert alert-secondary" style="align-self:center;"><?php echo $_SESSION['message']; ?></div>
                        <?php unset($_SESSION['message']);
                        }  ?>
                       
						<h2><?php echo $user->email?></h2>
						<span><?php echo ucfirst($user->role)?></span>
                        <br>
                        <?php 
                        if($user->role=='admin')
                        echo "<a href='dashboard' >Go to admin dashboard</a>";
                        else 
                        echo "<a href='makewriter' >Request to be a writer</a>";
                        ?>
                     <div class="row">
                          <div class="col-sm-12 text-center">
                            <button class="btn btn-primary btn-md">Edit User</button>
                            <button class="btn btn-danger btn-md">Delete</button>
                         </div>
						<hr class="border">
					</div>
					<div class="col-lg-12 text-center pb-2 card-icon">

					</div>
				</div>
			</div>
		</div>
	</div>
<!-- <div style="align-self:center ">
    <div class='card' style="background-color:rgba(0, 0, 0, 0.5);border-radius:1.2%; height:800px;width:400px;">
    <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="" srcset="" class="img-thumbnail">
    <br>
    
    <p><?php //echo $user->email?></p>
    </div>
</div> -->

<?php require('partials/footer.php'); ?>