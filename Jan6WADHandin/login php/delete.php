<?php
include_once("admin_login_check.php");
include_once("_connect.php");
//gets from link headers
if(!isset($_GET["d"]))
{
    echo "No user selected for deletion";
}
else
{
    $uid = $_GET["d"];
    $sql = "DELETE FROM `t_users` WHERE `t_users`.`UID` = $uid" ;
    mysqli_query($db_connect,$sql);
    echo "User ID $uid has been deleted.";

    header("Location:admin.php");
}

?>