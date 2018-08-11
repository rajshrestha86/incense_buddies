<?php

require_once './connection/db_cls_connect.php';
// include './connection/ChromePhp.php';



if(isset($_POST['btn-block'])){
	session_start();
	if(!isset($_SESSION['id']))
		header("location: index.php");
	$user=$_SESSION['id'];
	$user_to_block=$_POST['user_to_block'];
	ChromePhp::log('I want to block',$user_to_block);

	$block_comment_query = "Insert into Block(user_id, blocked_user_id) values ('$user', '$user_to_block')";
	$result = mysqli_query($conn, $block_comment_query);

		if($result)
		{
			header("location: index.php");

		} else{
			
	}

	// header("location: index.php");
	
}

?>