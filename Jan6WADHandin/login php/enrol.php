<?php

include_once("user_login_check.php");
include_once("_connect.php");


//gets from link headers
if(!isset($_GET["d"]) )
{
    die ("No course selected for enrolment");
}
else
{  

    $CID = $_GET["d"];


        // echo "<script>console.log($CID);</script>";


    $UID = $_SESSION["UID"];
    $sql = "INSERT INTO `t_enrolment` (`EID`, `timestamp`, `UID`, `CID`) VALUES (NULL, current_timestamp(), $UID, $CID)";
    mysqli_query($db_connect,$sql);

   header("Location:user.php");
}

?>