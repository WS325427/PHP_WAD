
<style>
    .form {
        display: flex;
        border: dotted;
        margin: auto;
        width: 200px;
        border: 3px solid green;
        padding: 10px;
        text-align: center;
    }
    .table {
        margin: auto;
        width: 50%;
        padding: 10px;
        text-align: center;
        border:solid;
    }
    .input{
        border:solid;
        text-align: left;
    }
    .title{
        color: red;
        text-align: center;
        font-size: 5em;
        font-family: "Times New Roman", Times, serif;
        font-style:oblique;
    }
</style>
<?php 
include_once("_login_check.php");
?>
<h1 class="title">DEEETS</h1>
<a href="logout.php">Log Out </a>
<div class="form">
    <form method="POST" action="insert.php">
        <input class="input" type="email" name="email" required placeholder="E-mail">
        <br>
        <input class="input"type="password" name="password" required placeholder="Password">
        <br>
        <input class="input"type="text" name="fname" required placeholder="First Name">
        <br>
        <input class="input"type="text" name="lname" required placeholder="Last Name">
        <br>
        <button type="submit">ADD</button>
    </form>
</div>

<?php
//connects to db
include_once("_connect.php");

$sql = "SELECT * FROM `t_users`";
$run = mysqli_query($db_connect, $sql);

//shows the format data is returned
//var_dump($run)
//tr = table row
?>



<table class="table" border>
    <thead>
        <tr>
            <th class="table">Email</th>
            <th class="table">Password</th>
            <th class="table">First Name</th>
            <th class="table">Last Name</th>
            <th class="table">Edit</th>
            <th class="table">Delete</th>
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
                <td><a href="edit.php?e=<?= $result["UID"] ?>">EDIT</a></td>
                <td><a href="delete.php?d=<?= $result["UID"] ?>">Delete</a></td>
            </tr>
        <?php }; ?>

    </tbody>

</table>