<?php
//insert queries for adding details to database
include_once("_connect.php");

//checks if fields are read
if(!isset($_POST["email"]) or !isset($_POST["password"]) or !isset($_POST["fname"]) or !isset($_POST["lname"]) or !isset($_POST["jobRole"])or !isset($_POST["access"])){
    echo "No inputs detected";
}
else{
$email = $_POST["email"];
$password = $_POST["password"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$jobRole = $_POST["jobRole"];
$access = $_POST["access"];

//sql query 
$sql = "INSERT INTO `t_users`(
    `UID`,
    `email`,
    `password`,
    `fname`,
    `lname`,
    `timestamp`,
    `access`,
    `jobRole`
)
VALUES(
    NULL,
    '$email',
    '$password',
    '$fname',
    '$lname',
    CURRENT_TIMESTAMP(),
    '$access',
    '$jobRole');";

    //performs the database query
    mysqli_query($db_connect,$sql);

    //message back to user (wont be seen due to header)
    echo $email." has been added";
    header("Location:admin.php");
}
?>