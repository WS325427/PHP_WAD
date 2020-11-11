<?php
session_start();
session_unset();
session_destroy();
echo("user has logged out");
header("Location:login.php?=4");
?>