<?php require('partials/head.php'); ?>
<link rel="stylesheet" type="text/css" href="public/css/profile.css">
<div class="container main-section" style="align-self:center;padding-bottom:13%;">
		<div class="row">
			<div class="offset-md-1 col-lg-10 " style="background-color:rgba(0, 0, 0, 0.5);border-radius:1.2%; ">
				<div class="row">
					<div class="col-lg-12 text-right p-2">
						<i class="fa fa-list" aria-hidden="true"></i>
					</div>
					
                    
					<div class="col-lg-12 text-center card-detail pt-3 pb-5">
                    <?php 
                        if (isset($_SESSION['message'])) {
                            ?><div class="alert alert-secondary" style="align-self:center;"><?php echo $_SESSION['message']; ?></div>
                        <?php unset($_SESSION['message']);
                        }  ?>
                       
						<h2><?php echo ucfirst($request->type)?></h2>
				        
					  <a href='' ><?php if($request->type="comment request")
					 		 echo explode("@@",ucfirst($request->text))[1];
							  else
							  echo ucfirst($request->text)?></a>
                     <div class="row">
                          <div class="col-sm-12 text-center">
                            <a href="requestHandler?reqId=<?php echo $request->id?>&answer=yes" class="btn btn-primary btn-md">Accept</a>
                            <a href="requestHandler?reqId=<?php echo $request->id?>&answer=no"class="btn btn-danger btn-md">Reject</a>
                         </div>
						<hr class="border">
					</div>
					<div class="col-lg-12 text-center pb-2 card-icon">

					</div>
				</div>
			</div>
		</div>
	</div>
<?php require('partials/footer.php'); ?>