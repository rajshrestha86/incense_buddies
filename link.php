<?php include './connection/api.php';?>
<?php include './connection/actions/post_comment.php';?>
<?php include './connection/actions/timeago.php';?>


<html>
<head>

    <?php
            include './include/header.php';
    ?>
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
                <?php $result = get_link()?>
                <br>

                <?php if ($result): ?>
                    <!-- Link Descriptions -->
                    <div class='card' >
                        <div  class="card-header bg-light ">
                            <div class='row'>
                                    <div class='col-10'>
                                     <small class="text-muted text-white">Posted by <a href="user.php?userid=<?php echo $result['user_id'] ?>"><?php echo $result['user_id'] ?> </a><?php echo time_elapsed_string($result['datetime'])?></small>
                                    </div>
                             
                        </div>
                        </div>

                        <div class='card-body'>
                            <strong><h6 style='color: black;'><?php echo $result['title'] ?></h6></strong>
                  <a href='<?php echo $result['link_url'] ?>'><p><?php echo $result['link_url'] ?></p></a>


                                </div>


                            </div>

                            <br>
                            <?php include('./connection/actions/errors.php'); ?>
                            <?php include('./connection/actions/success.php'); ?>



                            <!-- Link Comments -->

                            <div class="card" >

                                <div class="card-header bg-light ">
                                    <div class='row'>
                                        <div class='col-6'>
                                            <strong>Comments</strong>
                                        </div>
                                        <div class='col-6 text-right'>
                                            <button class="btn btn-default btn-sm" id="btn-comment" ><i class="fa fa-comments-o"> Post Comment...</i></button>
                                        </div>
                                    </div>
                                </div>
                                
                                

                                <div class="card-body">
                                 <blockquote id="post-comment">


                                    <form method="post" >

                                      <div class="form-group">
                                        <label class="control-label" for="comment">Comment:</label>
                                        <div class="">
                                          <textarea class="form-control" name="comment" rows="2"></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group col-sm-12">
                                      <div class="col-sm-12 text-right">
                                        <button type="submit" name='comment-btn' id="comment-btn" class="btn btn-success" type="button"><i class="fa fa-comment"></i> Post</button>
                                    </div>
                                </div>
                            </form>
                        </blockquote>


                         <ul class="list-unstyled">
                                <?php $result = get_comments()   ?>
                                 <?php while($res=mysqli_fetch_assoc($result)){?>
                                <li class="media" id=<?php echo $res['id'] ?>>
                                    <a class="pull-left" href="#">
                                      <img class="rounded-circle mr-3" src="http://www.gravatar.com/avatar/?d=monsterid&s=45">
                                  </a>
                                  <div class="media-body mt-0 mb-3">
                                        
                                      <strong class="media-heading"></strong> <small class="text-muted">Commented by <a href="user.php?userid=<?php echo $res['user_id'] ?>"><?php echo $res['user_id']?></a></small>
                                      <br/>

                                      <?php echo $res['comment_text'] ?>
                                  </div>
                              </li>
                              <!-- <hr> -->
                          <?php } ?> 
                          </ul>
                    </div>
                </div>
                <br>


                <!-- Error Card -->
                <?php else: ?>
                    <div class='card' >
                        <div  class="card-header bg-danger text-white"> 
                            No Link.
                        </div>

                        <div class='card-body'>



                      </div>

                  </div>    
              <?php endif?>
          </div>

          <div class='col-3'>
          </div>

      </div>


  </div>


</body>
</html>

<script>
    console.log('hello from jquery')
    $ (function() {
      $('#post-comment').hide();
      $('#btn-comment').on('click', function(event){
        event.preventDefault();
        $('#post-comment').show();
    });
  });




</script>