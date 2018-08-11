<?php
	require_once './connection/db_cls_connect.php';

	if(isset($_POST['btn-unblock'])){
	session_start();
	if(!isset($_SESSION['id']))
		header("location: index.php");
	$user=$_SESSION['id'];
	$user_to_unblock=$_POST['blocked_user_id'];
	ChromePhp::log('I want to block',$user_to_block);

	$block_comment_query = "DELETE from Block where user_id='$user' and blocked_user_id='$user_to_unblock'";
	$result = mysqli_query($conn, $block_comment_query);

		if($result)
		{
			// header("location: index.php");
			return $result;

		} else{
			return false;
			
			
	}

	// header("location: index.php");
	
}


?>