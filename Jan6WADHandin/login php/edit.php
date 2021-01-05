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
if (!isset($_GET["id"])) {
    //die kills the script, need to reload
    die("No user selected for edit");
} else if (isset($_POST["email"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $jobRole = $_POST["jobRole"];
    $uid = $_GET["id"];

    $sql = "UPDATE `t_users` 
    SET `email` = '$email', `password` = '$password', `fname` = '$fname', `lname` = '$lname' , `jobRole` = '$jobRole' 
    WHERE `t_users`.`UID` = $uid;";

    mysqli_query($db_connect, $sql);
    header("Location:admin.php");
    die("user has been updated");
} else {
    //search for the record itself
    $uid = $_GET["id"];
    $sql = "SELECT *  FROM `t_users` WHERE `UID` = $uid";
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
?>