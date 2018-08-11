
<?php include './connection/actions/login.php';?>
<?php include './include/redirect_to_home_on_logged_in.php';?>
<?php include './connection/api.php';?> 
<?php include './connection/actions/timeago.php';?>
<!DOCTYPE html>
<html>
<head>
	<?php include './include/header.php';?>
</head>
<body>
	<div class="bg-light navbar justify-content-center"><a href='./register.php'>Register</a></div>
	
	<br>
	<br>
	<div class='container-fluid' >
		<div class="row box" id="login-box">
			<div class='col-md-1'>
			</div>
			<div class="col-md-3">
				<div class='card'>
					<div class='card-header'>
						Login
					</div>
					<div class="card-body">
				
						<!-- <div class="row"> -->

				
							<?php include('./connection/actions/errors.php'); ?>
					
							<form id="login-form" name="login_form" role="form" style="display: block;" method="post" action=''>

	                  	
								<div class="form-group">
									<input type=text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value=""  required>
								</div>
								<div class="form-group">
									<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
								</div>
								<div class="col-xs-12 form-group pull-right">
									<button type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-primary">
										<span class="spinner"><i class="icon-spin icon-refresh" id="spinner"></i></span> Log In
									</button>
								</div>
							</form>
						<!-- </div> -->
					</div>
				</div>

			</div>


			<div class='col-md-6'>
				
				<div class='card'>
					<div class='card-header text-center'>
						Global Timeline
					</div>


					<div class='card-body'>
						<?php $result = get_global_timeline()   ?>
						<?php while($res=mysqli_fetch_assoc($result)){?>

							<div class='card'>

								<div class='card-header'>
									<div class='row'>
										<div class='col-10'>
											<small class="text-muted">Posted by <a href="user.php?userid=<?php echo $res['user_id'] ?>"><?php echo $res['user_id']?></a> <?php echo time_elapsed_string($res['datetime'])?></small>
										</div>
										<div class='col-2' >

										</div>
									</div>
								</div>
								<a href='link.php?id=<?php echo $res["id"]?>' style="text-decoration:none;">
									<div class='card-body'>
										<strong><h6 style='color: black;'><?php echo $res['title'] ?></h6></strong>
                  <p><?php echo $res['link_url'] ?></p>
										
									</div>
								</a>

								<div class='card-footer'>
	                  <img src='./static/img/comment.png' width='24px' height='24px'/> <?php echo $res['count'] ?> Comments
	              </div>
								</div>
							
							<br/>
						<?php } ?>



					</div>


				</div>	
			</div>

			<div class='col-md-2'>

			</div>
		</div>
	</div>
</body>
</html>