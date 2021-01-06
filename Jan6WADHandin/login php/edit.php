<style>
    .gridStyle {
        display: grid;
        grid-template-columns: 80px 180px;
    }
</style>

<?php
//php equivalent of import
include_once("admin_login_check.php");
include_once("_connect.php");

//
if (!isset($_GET["id"]) or !isset($_GET["table"])) {
    //die kills the script, need to reload
    die("No user or table selected for edit");
}
// forms reloads the page with updated information which will hit the query here
if ($_GET["table"] == "t_users") {

    $table = $_GET["table"];
    if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["jobRole"]) && isset($_GET["id"])) {

        $email = $_POST["email"];
        $password = $_POST["password"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $jobRole = $_POST["jobRole"];
        $uid = $_GET["id"];


        $sql = "UPDATE `t_users` 
    SET `email` = '$email', `password` = '$password', `fname` = '$fname', `lname` = '$lname' , `jobRole` = '$jobRole' 
    WHERE `$table`.`UID` = $uid;";

        mysqli_query($db_connect, $sql);
        header("Location:admin.php");
        die("user has been updated");
    } else {
        //search for the record itself
        $uid = $_GET["id"];
        $sql = "SELECT *  FROM  $table  WHERE `UID` = $uid";
        $run = mysqli_query($db_connect, $sql);
        $result = mysqli_fetch_assoc($run);

?>
        <!-- # is an anchor to itself, ie sends to itself -->
        <!-- loads to a new form filled with the values wanted to edit -->
        <button type="submit"><a href="admin.php">
                <div>Return to admin page</div>
            </a></button>
        <br> <br>
        <form method="POST" action="#">
            <div class="gridStyle">
                <label for="access">Email: </label><input type="email" name="email" required placeholder="E-mail" value="<?= $result["email"] ?>">
                <label for="access">Password: </label><input type="password" name="password" required placeholder="Password" value="<?= $result["password"] ?>">
                <label for="access">First Name: </label><input type="text" name="fname" required placeholder="First Name" value="<?= $result["fname"] ?>">
                <label for="access">Last Name: </label><input type="text" name="lname" required placeholder="Last Name" value="<?= $result["lname"] ?>">
                <label for="access">Job Role: </label><input type="text" name="jobRole" required placeholder="Job Role" value="<?= $result["jobRole"] ?>">

            </div>
            <br>
            <button type="submit">UPDATE</button>
        </form>
<?php
    }
}
?>
<?php
if ($_GET["table"] == "t_course") {

    $table = $_GET["table"];
    if (isset($_POST["CourseTitle"]) && isset($_POST["CourseDate"]) && isset($_POST["CourseEnd"]) && isset($_POST["description"]) && isset($_POST["CourseCapacity"]) && isset($_GET["id"])) {


        $CourseTitle = $_POST["CourseTitle"];
        $CourseDate = $_POST["CourseDate"];
        $CourseEnd = $_POST["CourseEnd"];
        $description = $_POST["description"];
        $CourseCapacity = $_POST["CourseCapacity"];
        $id = $_GET["id"];

        $sql = "UPDATE `$table` 
    SET `CourseTitle` = '$CourseTitle', `CourseDate` = '$CourseDate', `CourseEnd` = '$CourseEnd', `description` = '$description' , `CourseCapacity` = '$CourseCapacity' 
    WHERE `$table`.`CID` = $id;";

        mysqli_query($db_connect, $sql);
        header("Location:admin.php");
        die("Course has been updated");
    } else {
        //search for the record itself
        $id = $_GET["id"];
        $sql = "SELECT *  FROM $table WHERE `CID` = $id";
        $run = mysqli_query($db_connect, $sql);
        $result = mysqli_fetch_assoc($run);

?>
        <!-- # is an anchor to itself, ie sends to itself -->
        <!-- loads to a new form filled with the values wanted to edit -->
        <button type="submit"><a href="admin.php">
                <div>Return to admin page</div>
            </a></button>
        <br> <br>
        <form method="POST" action="#">
            <div class="gridStyle">
                <label for="access">Course Title: </label><input type="text" name="CourseTitle" required placeholder="Course Title" value="<?= $result["CourseTitle"] ?>">
                <label for="access">Start Date: </label><input type="date" name="CourseDate" required placeholder="Start Date" value="<?= $result["CourseDate"] ?>">
                <label for="access">End Date: </label><input type="date" name="CourseEnd" required placeholder="End Date" value="<?= $result["CourseEnd"] ?>">
                <label for="access">Description: </label><input type="text" name="description" required placeholder="Description" value="<?= $result["description"] ?>">
                <label for="access">Capacity: </label><input type="number" name="CourseCapacity" required placeholder="Capacity" value="<?= $result["CourseCapacity"] ?>">

            </div>
            <br>
            <button type="submit">UPDATE</button>
        </form>
<?php
    }
}
?>