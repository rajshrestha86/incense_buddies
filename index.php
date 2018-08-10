
<?php include './connection/actions/login.php';?>
<?php include './include/redirect_to_home_on_logged_in.php';?>
<!DOCTYPE html>
<html>
<head>
<?php include './include/header.php';?>
</head>
<body>
<a href='./register.php'>Register </a>
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
				  <?php include './connection/actions/errors.php';?>
                  <form id="login-form" name="login_form" role="form" style="display: block;" method="post" action='index.php'>
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
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
</body>
</html>