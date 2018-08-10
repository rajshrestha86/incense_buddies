<?php
require_once './connection/db_cls_connect.php';

include './connection/ChromePhp.php';
// ChromePhp::log('Registration console!');

$errors = array();

// Escaping datas to prevent injections
if (isset($_POST['registration-submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    ChromePhp::log($username);
    ChromePhp::log($password);

    // Checking for existing users
    $user_check_query = "SELECT * FROM User WHERE id='$username' OR email='$email' LIMIT 1";

    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['id'] === $username) {
            array_push($errors, "Username already exists");
            ChromePhp::log("Username already exists.");
            echo "usernmae exists";
        }

        if ($user['email'] === $email) {
            ChromePhp::log("Email already exists.");
            array_push($errors, "email already exists");
        }
    }

    if(strlen($password)<5)
    {
        array_push($errors, "Password must be minimum of 5 characters.");   
    }

    if (count($errors) == 0) {
   
        $password = password_hash($password, PASSWORD_BCRYPT);
        ChromePhp::log($password);
        mysqli_query($conn, "Insert into User(id, name, email, password) values('$username', '$name', '$email', '$password')");
        // echo "hello";
        header("location: index.php");
    }

}
