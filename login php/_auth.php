<?php
include_once("_connect.php");
if (!isset($_POST["email"]) or !isset($_POST["password"])) {
    //placing headers wherever theres a die and redirect them with error message
       header("Location:login.php?e=2");
    die("No Username/Password Entered");
} else {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM `t_users` WHERE `email` = '$email' AND `password` = '$password' ";
    $query = mysqli_query($db_connect, $sql);
    $count = mysqli_num_rows($query);
    //triple === evaluates type and value
    if ($count === 0) {
           header("Location:login.php?e=3");
        die("No records match");
    } else if ($count === 1) {
        session_start();
        //superglobals
        $_SESSION["auth"] = "admin";
        //headers can often hide errors so may need to be commented out to check
          header("Location:index.php");
    } else {
        echo "Stop hacking this databse";
    }
}
