<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: index.php');
}

?>



<?php include './connection/actions/create_link.php'?>
<?php include './connection/api.php';?> 
<?php include './connection/actions/timeago.php';?>
<!DOCTYPE html>
<html>
<head>
<?php include './include/header.php';?>
</head>
<body>
<?php include './include/navigation_bar.php'?>
<br/>

<div class='container-fluid'>
    <div  class='row'>

        <div class='col-1'>

        </div>
        <div class='col-3'>

            <div class="card text-white bg-secondary">
            <div class="card-header text-white">
    
      Share your link.
    
  </div>
            <div class='card-body' >
            <form id="register-form" name="register_form" role="form" style="display: block;" method="post" action='home.php'>
                  <?php include './connection/actions/errors.php';?>
                  <?php include './connection/actions/success.php';?>

                  <div class="form-group">
						<textarea type="text" rows=2 name="title" id="title" tabindex="1" class="form-control" placeholder="Title" value=""  required></textarea>
				    </div>


                    <div class="form-group">
						<input type="text" name="link" id="link" tabindex="2" class="form-control" placeholder="Link" value=""  required>
				    </div>


                     <div class="col-xs-12 form-group pull-right">
							<button type="submit" name="link-submit" id="link-submit" tabindex="5" class="form-control btn btn-primary">
							 <span class="spinner"><i class="icon-spin icon-refresh" id="spinner"></i></span> Share Link
							</button>
					  </div>




            </form>
            </div>




        </div>
        <br>
        <div class='card text-white bg-secondary'>
          <div class='card-header'>
            Top 5 Popular Links
          </div>

          <div class='card-body'>
          <?php $result = get_top_5_links()   ?>
          <?php while($res=mysqli_fetch_assoc($result)){?>

            <div class='card text-secondary bg-light'>

              <a href='link.php?id=<?php echo $res["id"]?>' style="text-decoration:none;">
                <div class='card-body'>
                  <strong><h6 style='color: black;'><?php echo $res['title'] ?></h6></strong>
                  <p><?php echo $res['link_url'] ?></p>
                  
                </div>
              </a>
              <div class='card-footer'>
                  <img src='./static/img/comment.png' width='24px' height='24px'/> <?php echo $res['count'] ?> Comments 
                  <br/>
                  <small class="text-muted">Posted by <a href="user.php?userid=<?php echo $res['user_id'] ?>"><?php echo $res['user_id']?></a> <?php echo time_elapsed_string($res['datetime'])?></small>
              </div>
              </div>
            
            <br/>
          <?php } ?>
        </div>

        </div>


        </div>



        <div class='col-6' >
        <div class='card text-white bg-secondary'>
        <div class='card-header text-center'>
          Global Timeline
        </div>


        <div class='card-body'>
          <?php $result = get_global_timeline()   ?>
          <?php while($res=mysqli_fetch_assoc($result)){?>

            <div class='card text-secondary bg-light'>

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
                  <h6><?php echo $res['link_url'] ?></h6>
                  
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

        



    </div>



</div>






</body>
</html>