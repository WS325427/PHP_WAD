<h1>DEEETS</h1>


<form method="POST" action="insert.php">
    <input type="email" name="email" required placeholder="E-mail">
    <br>
    <input type="password" name="password" required placeholder="Password">
    <br>
    <input type="text" name="fname" required placeholder="First Name">
    <br>
    <input type="text" name="lname" required placeholder="Last Name">
    <br>
    <button type="submit">LOGIN</button>

</form>

<?php
//connects to db
include_once("_connect.php");

$sql = "SELECT * FROM `t_users`";
$run = mysqli_query($db_connect, $sql);

//shows the format data is returned
//var_dump($run)
//tr = table row
?>



<table border="100">
    <thead>
        <tr>
            <th>Email</th>
            <th>Password</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($result = mysqli_fetch_assoc($run)) {
        ?>
            <tr>
                <td><?= $result["email"] ?></td>
                <td><?php echo $result["password"]; //long code 
                    ?></td>
                <td><?= $result["fname"] ?></td>
                <td><?= $result["lname"] ?></td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        <?php }; ?>

    </tbody>

</table>