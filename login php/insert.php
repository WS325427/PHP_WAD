<?php
include_once("_connect.php");

if(!isset($_POST["email"]) or !isset($_POST["password"]) or !isset($_POST["fname"]) or !isset($_POST["lname"])){
    echo "No inputs detected";
}
else{
$email = $_POST["email"];
$password = $_POST["password"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];

$sql = "INSERT INTO `t_users`(
    `UID`,
    `email`,
    `password`,
    `fname`,
    `lname`,
    `timestamp`
)
VALUES(
    NULL,
    '$email',
    '$password',
    '$fname',
    '$lname',
    CURRENT_TIMESTAMP());";
    mysqli_query($db_connect,$sql);
    echo $email." has been added";
    header("Location:index.php");
}
?>