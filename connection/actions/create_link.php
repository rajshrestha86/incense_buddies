<?php
require_once './connection/db_cls_connect.php';

include './connection/ChromePhp.php';
// ChromePhp::log('Registration console!');

$errors = array();
$success = array();

// Escaping datas to prevent injections
if (isset($_POST['link-submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $link_url = mysqli_real_escape_string($conn, $_POST['link']);
    
    if(strlen($title)==0 || strlen($link_url)==0){
        
        array_push($errors, "One or more field empty.");   

    }
    
    

    // Checking for existing users
    

    if (count($errors) == 0) {
   
        $date = date('Y-m-d H:i');
        session_start();
        $user_id=$_SESSION['id'];

        $result=mysqli_query($conn, "Insert into IncenseLink(user_id, datetime, link_url, title) values('$user_id', '$date', '$link_url', '$title')");
        if($result)
            array_push($success, "Successfully posted a new link.");  
        else
            array_push($errors, "Server Error.");  
        // echo "hello";
        // header("location: index.php");
    }

}

?>
