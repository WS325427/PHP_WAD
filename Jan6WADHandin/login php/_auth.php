<?php
include_once("_connect.php");
//Post requests information in url body
//if there is no email or password written, return aerror code 2 in url to login page
if (!isset($_POST["email"]) or !isset($_POST["password"])) {
    //placing headers wherever theres a die and redirect them with error message
    header("Location:login.php?e=2");
    die("No Username/Password Entered");
} else {
    //select from the database t_users where the entered email and password matches
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM `t_users` WHERE `email` = '$email' AND `password` = '$password' ";
    //sends the sql query to the database 
    $query = mysqli_query($db_connect, $sql);
    $count = mysqli_num_rows($query);
    //triple === evaluates type and value

    //if no rows are returned, there is no matching details from users table
    if ($count === 0) {
        header("Location:login.php?e=3");
        die("No records match");
        //if the query count returns 1 then login
    } else if ($count === 1) {
        $result = mysqli_fetch_assoc($query);
        //superglobals _SESSION
        session_start();
        $_SESSION["auth"] = $result["access"];
        $_SESSION["name"] = $result["fname"];
        $_SESSION["UID"] = $result["UID"];
        //headers can often hide errors so may need to be commented out to check
        if ($_SESSION["auth"] === "admin") {
            header("Location:admin.php");
        }
        if ($_SESSION["auth"] === "user") {
            header("Location:user.php");
        }
    } else {
        echo "Stop hacking this databse";
    }
}
