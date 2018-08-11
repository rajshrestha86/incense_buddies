<?php
	require_once './connection/db_cls_connect.php';
	// include './connection/ChromePhp.php';

	$errors = array();
	$success=array();



	if (isset($_POST['comment-btn'])) {

		ChromePhp::log('There is a comment post request!');
		session_start();
		$user=$_SESSION['id'];
		if(!$user){
			array_push($errors, "You must be logged in to comment.");
			return;
		}
		$incenselink_id=$_GET['id'];
		$comment_text=mysqli_escape_string($conn,$_POST['comment']);
		ChromePhp::log('This is comment text', $comment_text, $incenselink_id, $user);

		$post_comment_query = "Insert into Comment(user_id, incenselink_id, comment_text) values ('$user', '$incenselink_id', '$comment_text')";
		 $result = mysqli_query($conn, $post_comment_query);

		if($result)
		{
			array_push($success, "You have commented on the link.");
		} else
			array_push($errors, "Error connecting to server.");


	}


?>