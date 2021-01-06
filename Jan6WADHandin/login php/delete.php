<?php
include_once("admin_login_check.php");
include_once("_connect.php");
//gets from link headers
if(!isset($_GET["d"]) or !isset($_GET["table"]) )
{
    die ("No table or user selected for deletion");
}
else
{   $table = $_GET["table"];
    $uid = $_GET["d"];
    $idType = $table == "t_users" ? "UID" : "CID";
    $sql = "DELETE FROM $table WHERE $table.$idType = $uid" ;
    mysqli_query($db_connect,$sql);
    echo "User ID $uid has been deleted.";

    header("Location:admin.php");
}

?>