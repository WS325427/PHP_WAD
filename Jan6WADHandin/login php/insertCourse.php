<?php
//connects page to database
include_once("_connect.php");

//checks if fields are read
if(!isset($_POST["CourseTitle"]) or !isset($_POST["CourseDate"]) or !isset($_POST["description"]) or !isset($_POST["CourseEnd"]) or !isset($_POST["CourseCapacity"])){
    echo "inputs incpmplete";
}
else{
$CourseTitle = $_POST["CourseTitle"];
$CourseDate = $_POST["CourseDate"];
$CourseEnd = $_POST["CourseEnd"];
$description = $_POST["description"];
$CourseCapacity = $_POST["CourseCapacity"];

//sql query 
$sql = "INSERT INTO `t_course`(
    `CID`,
    `CourseTitle`,
    `CourseDate`,
    `CourseEnd`,
    `description`,
    `timestamp`,
    `CourseCapacity`
)
VALUES(
    NULL,
    '$CourseTitle',
    '$CourseDate',
    '$CourseEnd',
    '$description',
    CURRENT_TIMESTAMP(),
    '$CourseCapacity');";

    //performs the database query
    mysqli_query($db_connect,$sql);

    //message back to user (wont be seen due to header)
    echo $email." has been added";
    header("Location:admin.php");
}
