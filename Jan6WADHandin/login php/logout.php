<!-- Logout page -->
<?php

//why do we need to start a session then unset
session_start();
//kills the cookie
setcookie(session_name(), '', 100);
session_unset();
session_destroy();
echo("user has logged out");
header("Location:login.php?e=4");
?>