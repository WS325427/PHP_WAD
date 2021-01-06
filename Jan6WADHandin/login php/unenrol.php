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
    $EID = $_GET["d"];
    $sql = "DELETE FROM `t_enrolment` WHERE `t_enrolment`.`EID` = $EID";
    mysqli_query($db_connect,$sql);
    echo "Added to course";

     header("Location:user.php");
}

?>