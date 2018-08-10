<?php 
session_start();
if (!isset($_SESSION['id'])){
        header('location: index.php');
}

?>
<html>
<head>
<?php include './include/header.php';?>
</head>
<body>
<?php include './include/navigation_bar.php' ?>
<h1> Welcome </h1>
<a href='./include/logout.php'>Logout</a>

<duv class='container'>
    <div  class='row'>
        <div class='col-md-4'>

            <form id="register-form" name="register_form" role="form" style="display: block;" method="post" action='home.php'>
                  <?php include './connection/actions/errors.php';?>

                  <div class="form-group">
						<input type="text" name="title" id="title" tabindex="1" class="form-control" placeholder="Title" value=""  required>
				    </div>


                    <div class="form-group">
						<input type="text" name="link" id="link" tabindex="2" class="form-control" placeholder="Link" value=""  required>
				    </div>


            </form>



        </div>



        <div class='col-md-8' >




        </div>




    </div>



</div>






</body>
</html>