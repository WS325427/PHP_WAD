<?php
include_once("_connect.php");

if(!isset($_POST["email"]) or !isset($_POST["password"]) or !isset($_POST["fname"]) or !isset($_POST["lname"])){
    echo "No inputs detected";
}
else{
$email = $_POST["email"];
$email = $_POST["password"];
$email = $_POST["fname"];
$email = $_POST["lname"];
}
?>