<?php
require_once './connection/db_cls_connect.php';

require_once './connection/ChromePhp.php';
ChromePhp::log("API");





function get_link(){
    $link_id=$_GET['id'];
    global $conn;
     // Get link from datatbase.
     ChromePhp::log($link_id);
     $get_link_query = "SELECT * FROM IncenseLink  WHERE id='$link_id' LIMIT 1";
     $result = mysqli_query($conn, $get_link_query);
     $link = mysqli_fetch_assoc($result);

    // ChromePhp::log('Connection Object',$conn);
    // ChromePhp::log('Connection Object',$conn);
    

     if($link){
        // ChromePhp::log('Queried!');
     } else{
        ChromePhp::log($link['id']);
     }
     return $link;
}


function get_comments(){
    ChromePhp::log('Queried and got comments!');
    $link_id=$_GET['id'];
    global $conn;
    $get_comments_query;
     // Query to gey a comment for the particular link.
    session_start();
    if(isset($_SESSION['id'])){
        $user=$_SESSION['id'];
        $get_comments_query = "SELECT * FROM Comment  WHERE incenselink_id='$link_id' AND user_id NOT IN (select blocked_user_id from Block where user_id='$user')";
 } else
    $get_comments_query = "SELECT * FROM Comment  WHERE incenselink_id='$link_id'";

     $result = mysqli_query($conn, $get_comments_query);

     if($result){
        return $result;
        }
        else {
            
     }

     // return $comments;

}


function get_user_info(){
    $user_id=$_GET['userid'];
    global $conn;
     // Get link from datatbase.
     ChromePhp::log($user_id);
     $get_link_query = "SELECT * FROM User  WHERE id='$user_id' LIMIT 1";
     $result = mysqli_query($conn, $get_link_query);
     $user = mysqli_fetch_assoc($result);

     if($link){
     } else{
        ChromePhp::log($link['id']);
     }
     return $user;
}


function get_link_for_user($user){
    $user_id=$_GET['userid'];
    global $conn;
     // Get link from datatbase.
     ChromePhp::log($link_id);
     $get_link_query = "SELECT * FROM IncenseLink  WHERE user_id='$user_id'";
     $result = mysqli_query($conn, $get_link_query);
    if($result){
        return $result;
        }
        else {
            return null;
     }
}

function get_global_timeline(){
    global $conn;
    session_start();
    $get_global_timeline;

    // Check and donot show posts from blocked users.
    if(isset($_SESSION['id'])){
        $user=$_SESSION['id'];
        $get_global_timeline="select id, user_id, datetime, link_url, title, ifnull(count, 0) as count from `IncenseLink`  LEFT JOIN  (SELECT count(id) as count, incenselink_id as incense_id FROM `Comment` GROUP BY incenselink_id) AS comment ON IncenseLink.id=comment.incense_id where user_id NOT IN (SELECT blocked_user_id FROM Block where user_id='$user') ORDER BY datetime DESC LIMIT 5";
    } else
        $get_global_timeline= "select id, user_id, datetime, link_url, title, ifnull(count, 0) as count from `IncenseLink`  LEFT JOIN  (SELECT count(id) as count, incenselink_id as incense_id FROM `Comment` GROUP BY incenselink_id) AS comment ON IncenseLink.id=comment.incense_id ORDER BY datetime DESC LIMIT 5";
    
    $result = mysqli_query($conn, $get_global_timeline);
    if($result){
        return $result;
    }
    else {
        echo 'Error connecting to server';
            
     }

}


function get_top_5_links(){
      global $conn;
    session_start();
    $get_global_timeline;

    // Check and donot show posts from blocked users.
    if(isset($_SESSION['id'])){
        $user=$_SESSION['id'];
        $get_global_timeline="select id, user_id, datetime, link_url, title, ifnull(count, 0) as count from `IncenseLink`  LEFT JOIN  (SELECT count(id) as count, incenselink_id as incense_id FROM `Comment` GROUP BY incenselink_id) AS comment ON IncenseLink.id=comment.incense_id where user_id NOT IN (SELECT blocked_user_id FROM Block where user_id='$user') ORDER BY count DESC LIMIT 5";
    } else
        $get_global_timeline= "select id, user_id, datetime, link_url, title, ifnull(count, 0) as count from `IncenseLink`  LEFT JOIN  (SELECT count(id) as count, incenselink_id as incense_id FROM `Comment` GROUP BY incenselink_id) AS comment ON IncenseLink.id=comment.incense_id ORDER BY datetime DESC LIMIT 5";
    
    $result = mysqli_query($conn, $get_global_timeline);
    if($result){
        return $result;
    }
    else {
        echo 'Error connecting to server';
            
     }
}


function get_blocked_user(){
    global $conn;
    session_start();

    $user=$_SESSION['id'];
    $get_blocked_user="SELECT blocked_user_id, email FROM `Block` INNER JOIN User ON Block.blocked_user_id=User.id WHERE user_id='$user'";

    $result = mysqli_query($conn, $get_blocked_user);
    if($result){
        return $result;
    }
}


function test(){
    return 'Test Successfull';
}

?>