<?php
include_once("_connect.php");
if (!isset($_GET["e"])) {
    die("No user selected for edit");
} else if (isset($_POST["email"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $uid = $_GET["e"];
    $sql = "UPDATE `t_users` 
    SET `email` = '$email', `password` = '$password', `fname` = '$fname', `lname` = '$lname' 
    WHERE `t_users`.`UID` = $uid;";

    mysqli_query($db_connect, $sql);
    header("Location:index.php");
    die("user has been updated");
    
} else {
    //search for the record itself
    $uid = $_GET["e"];
    $sql = "SELECT *  FROM `t_users` WHERE `UID` = $uid";
    $run = mysqli_query($db_connect, $sql);
    $result = mysqli_fetch_assoc($run);

?>
    <!-- # is an anchor to itself, ie sends to itself -->
    <!-- loads to a new form filled with the values wanted to edit -->
    <form method="POST" action="#">
        <input type="email" name="email" required placeholder="E-mail" value="<?= $result["email"] ?>">
        <br>
        <input type="password" name="password" required placeholder="Password" value="<?= $result["password"] ?>">
        <br>
        <input type="text" name="fname" required placeholder="First Name" value="<?= $result["fname"] ?>">
        <br>
        <input type="text" name="lname" required placeholder="Last Name" value="<?= $result["lname"] ?>">
        <br>
        <button type="submit">UPDATE</button>
    </form>


<?php
}
?>