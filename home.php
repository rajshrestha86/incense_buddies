<?php 
session_start();
if (!isset($_SESSION['id'])){
        header('location: index.php');
}

?>



<?php include './connection/actions/create_link.php' ?>
<html>
<head>
<?php include './include/header.php';?>
</head>
<body>
<?php include './include/navigation_bar.php' ?>

<duv class='container-fluid'>
    <div  class='row'>
     
        <div class='col-lg-1'>

        </div>
        <div class='col-md-4 col-lg-3'>
        <h1> Welcome </h1>

            <form id="register-form" name="register_form" role="form" style="display: block;" method="post" action='home.php'>
                  <?php include './connection/actions/errors.php';?>
                  <?php include './connection/actions/success.php';?>

                  <div class="form-group">
						<input type="text" name="title" id="title" tabindex="1" class="form-control" placeholder="Title" value=""  required>
				    </div>


                    <div class="form-group">
						<input type="text" name="link" id="link" tabindex="2" class="form-control" placeholder="Link" value=""  required>
				    </div>


                     <div class="col-xs-12 form-group pull-right">     
							<button type="submit" name="link-submit" id="link-submit" tabindex="5" class="form-control btn btn-primary">
							 <span class="spinner"><i class="icon-spin icon-refresh" id="spinner"></i></span> Post a Link
							</button>
					  </div>




            </form>



        </div>



        <div class='col-md-8 col-lg-7' >
        <h1> Your links </h1>



        </div>

        <div class='col-lg-1'>

        </div>




    </div>



</div>






</body>
</html>