<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<?php
include_once("user_login_check.php");
//connects to db
include_once("_connect.php");

$sql = "SELECT * FROM `t_users`";
$run = mysqli_query($db_connect, $sql);
?>

<style>
  #logout {
    font-size: 20px;
    background-color: orange;
    font-weight: bold;
  }

  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .right-align {
    margin-left: auto;
  }
</style>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="DTEE">
  <title>Admin Page</title>

  <!-- Favicons -->

  <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#563d7c">

  <!-- Custom styles for this template -->
</head>

<body>
  <div class="navbar navbar-expand-md navbar-dark bg-dark">
    <div>
      <h1>Hello <?php echo ($_SESSION["name"]) ?>
      </h1> <button id="Log Out"><a href="logout.php">
          <div>LOG Out</div>
        </a></button>
    </div>
    <img class="rounded float-right right-align" src="img/Assessment Company Logo.png">

  </div>

  <main role="main" class="container">
    <h2>Available Courses</h2>
    <button onclick="tableshowOrHideEmployeeTable()">Show/Hide</button>
    <!-- <h1 class="title">DEEETS</h1> -->
    <!-- //shows the format data is returned
//var_dump($run)
//tr = table row -->
    <div id="usersTable">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="table">Email</th>
            <th class="table">Password</th>
            <th class="table">First Name</th>
            <th class="table">Last Name</th>
            <th class="table">Job Role</th>
            <th class="table">Access Level</th>
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
                <td><?php echo $result["password"] ?></td>
                <td><?= $result["fname"] ?></td>
                <td><?= $result["lname"] ?></td>
                <td><?= $result["jobRole"] ?></td>
                <td><?= $result["access"] ?></td>
                <td><a href="edit.php?id=<?= $result["UID"] ?>">EDIT</a></td>
                <td><a href="delete.php?d=<?= $result["UID"] ?>">Delete</a></td>
              </tr>

          <?php
          };
          ?>

        </tbody>

      </table>
    </div>



    <h2>Enrolled Courses</h2>
    <button onclick="tableshowOrHideCourseTable()">Show/Hide</button>

    <div id="courseTable">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="table">Email</th>
            <th class="table">Password</th>
            <th class="table">First Name</th>
            <th class="table">Last Name</th>
            <th class="table">Job Role</th>
            <th class="table">Access Level</th>
            <th class="table">Edit</th>
            <th class="table">Delete</th>

          </tr>
        </thead>
        <tbody>
          <?php
          //for some reason, need to initialise query again
          //Need to create table
          $sql = "SELECT * FROM `t_users`";
          $run = mysqli_query($db_connect, $sql);
          while ($result = mysqli_fetch_assoc($run)) {
          ?>
              <tr>
                <td><?= $result["email"] ?></td>
                <td><?php echo $result["password"] ?></td>
                <td><?= $result["fname"] ?></td>
                <td><?= $result["lname"] ?></td>
                <td><?= $result["jobRole"] ?></td>
                <td><?= $result["access"] ?></td>
                <td><a href="edit.php?id=<?= $result["UID"] ?>">EDIT</a></td>
                <td><a href="delete.php?d=<?= $result["UID"] ?>">Delete</a></td>
              </tr>

          <?php
          };
          ?>

        </tbody>

      </table>
  </main><!-- /.container -->
</body>

</html>

<script>
  tableshowOrHideEmployeeTable = () => {
    var table = document.getElementById("usersTable");
    if (table.style.display === "none") {
      table.style.display = "block";
    } else {
      table.style.display = "none";
    }
  }
  tableshowOrHideCourseTable = () => {
    var table = document.getElementById("courseTable");
    if (table.style.display === "none") {
      table.style.display = "block";
    } else {
      table.style.display = "none";
    }
  }
</script>