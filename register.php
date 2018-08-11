
<?php include('./connection/actions/registration.php'); ?>
<?php include('./include/redirect_to_home_on_logged_in.php'); ?>
<!DOCTYPE html>
<html>
<head>
<?php include('./include/header.php'); ?>
</head>
<body>
	<div class="bg-light navbar justify-content-center"><a href='./index.php'>Login </a></div>

<br>
<br>
<div class="row box" id="login-box">
<div class='col-md-3'>
</div>
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-login">
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-12">
				  <div class="alert alert-danger" role="alert" id="error" style="display: none;">...</div>
				  <form id="register-form" name="register_form" role="form" style="display: block;" method="post" action='register.php'>
                  <?php include('./connection/actions/errors.php'); ?>
                  <div class="form-group">
						<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Full Name" value=""  required>
					</div>  
                  
                  <div class="form-group">
						<input type="text" name="username" id="username" tabindex="2" class="form-control" placeholder="Username" value=""  required>
					</div>                      

                      <div class="form-group">
						<input type="email" name="email" id="email" tabindex="3" class="form-control" placeholder="Email" value=""  required>
					  </div>

					  <div class="form-group">
						<input type="password" name="password" id="password" tabindex="4" class="form-control" placeholder="Password" required> 
					  </div>

					  <div class="col-xs-12 form-group pull-right">     
							<button type="submit" name="registration-submit" id="registration-submit" tabindex="5" class="form-control btn btn-primary">
							 <span class="spinner"><i class="icon-spin icon-refresh" id="spinner"></i></span> Register
							</button>
					  </div>
				  </form>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>

</body>
</html>

