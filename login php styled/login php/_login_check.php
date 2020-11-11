<?php
session_start();
if (isset($_SESSION["auth"]) && $_SESSION["auth"] === "admin") {
    //if login correct
} else {
    header("Location:login.php?e=1");
    die("Not logged in");
}
