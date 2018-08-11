<?php include './connection/api.php';?>
<?php include './connection/actions/timeago.php';?>
<?php include './connection/actions/blockuser.php';?>


<html>
<head>
    <?php include './include/header.php';?>
</head>
<body>
    
    <?php 
        session_start();
        if(isset($_SESSION['id']))
            include './include/navigation_bar.php';
        else
            echo'<div class="bg-light navbar justify-content-center"><a class="" href="index.php">Home</a></div>'
    ?>
    <div class='container'>
        <div class='row'>
            <div class='col-3'>
            </div>

            <div class='col-6'>
                <?php $result = get_user_info()?>
                <br>

                <?php if ($result): ?>

                	<!-- User description -->
                    <div class='card text-white bg-secondary' >
                        <div  class="card-header text-white">
                        	<div class='row'>
                                        <div class='col-8'>
                            <?php echo $result['id'] ?>, <?php echo $result['email'] ?> 
                        </div>
                        <div class='col-4' >

                        	
                        </div>
                        </div>
                        </div>

                        <form method="post" class='offset-col-8'>
                        		<input type="hidden" name="user_to_block" value="<?php echo $result['id'] ?>">
                        	<?php
                        		session_start();
                        		if(isset($_SESSION['id']))
                        			if($_SESSION['id']!=$result['id'])
                        				echo '<button class="btn btn-danger btn-sm float-right mt-1 mr-1" name="btn-block" id="btn-block" >Block</button>'
                        	?>
                        </form>

                        <div class='card-body'>

                            <?php $result = get_link_for_user($_GET['userid'])   ?>
                                 <?php while($res=mysqli_fetch_assoc($result)){?>
                                 	
                                 	<div class='card'>
                                 	
                                 	<div class='card-header'>
                                 		<div class='row'>
                                 	<div class='col-10'>
                                 	 <small class="text-muted">Posted by <?php echo $res['user_id'] ?> <?php echo time_elapsed_string($res['datetime'])?></small>
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
							</div>
                                 <br/>
                                 <?php } ?>

                                </div>


                            </div>

                            <br>
                            <?php include('./connection/actions/errors.php'); ?>
                            <?php include('./connection/actions/success.php'); ?>



                         
                           


                <!-- Error Card -->
                <?php else: ?>
                    <div class='card' >
                        <div  class="card-header bg-danger text-white"> 
                           User Not found.
                        </div>

                        <div class='card-body'>
                        	Please search for valid user.



                      </div>

                  </div>    
              <?php endif?>
          </div>

          <div class='col-3'>
          </div>

      </div>


  </div>

<script>
	function clicked(){
		console.log('hello');
	}


</script>
</body>
</html>


