<?php

include_once("_connect.php");
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

    header("Location:index.php");
}





?>