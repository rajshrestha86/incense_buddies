<?php
require_once './connection/db_cls_connect.php';

include './connection/ChromePhp.php';
// ChromePhp::log('Registration console!');

$errors = array();

if (isset($_POST['login-submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password =$_POST['password'];

    ChromePhp::log($username);
    ChromePhp::log($password);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {

        ChromePhp::log($password);
        $query = "SELECT * FROM User WHERE id='$username'";
        $results = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($results);

        if (mysqli_num_rows($results) == 1) {
            $auth = password_verify($password, $user['password']);
            ChromePhp::log($user['password']);
            if ($auth) {
                session_start();
                $_SESSION['id'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: home.php');
            } else {
                array_push($errors, "Wrong username/password combination");
            }

        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

?>
