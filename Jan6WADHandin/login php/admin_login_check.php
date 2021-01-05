<?php
session_start();
if (isset($_SESSION["auth"]) && ($_SESSION["auth"] === "admin")) {
    //if login correct
} else {
    //error number passed to login page
    //error number passed to login page
    session_start();
    setcookie(session_name(), '', 100);
    session_unset();
    session_destroy();
    header("Location:login.php?e=1");
    die("Not logged in");
}
