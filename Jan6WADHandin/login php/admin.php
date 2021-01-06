<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<?php
include_once("admin_login_check.php");
//connects to db
include_once("_connect.php");
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

  .addButton {
    transform: scale(0.5) translate(-100px, 8px);
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
    <?php $table = "t_users"; ?>
    <h2>Registered Employees
      <button class="addButton"><a href="addToTable.php?table=<?= $table ?>">
          <div>Add Employee</div>
        </a></button>
    </h2>


    <button onclick="tableshowOrHideTable(`usersTable`)">Show/Hide</button>
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
          $sql = "SELECT * FROM $table";
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
              <td><a href="edit.php?id=<?= $result["UID"] ?>&table=<?= $table ?>">EDIT</a></td>
              <td><a onclick="return confirm('Are you sure?')" href="delete.php?d=<?= $result["UID"] ?>&table=<?= $table ?>">Delete</a></td>
            </tr>

          <?php
          };
          ?>

        </tbody>

      </table>
    </div>


    <?php $table = "t_course"; ?>
    <h2>Courses Available
      <button class="addButton"><a href="addToTable.php?table=<?= $table ?>">
          <div>Add Course</div>
        </a></button>
    </h2>

    <button onclick="tableshowOrHideTable(`courseTable`)">Show/Hide</button>

    <div id="courseTable">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="table">Course Title</th>
            <th class="table">Start Date</th>
            <th class="table">End Date</th>
            <th class="table">Duration</th>
            <th class="table">Description</th>
            <th class="table">Enrolled</th>
            <th class="table">Capacity</th>
            <th class="table">Edit</th>
            <th class="table">Delete</th>

          </tr>
        </thead>
        <tbody>
          <?php

          $sql = "SELECT `t_course`.*, COUNT(`t_enrolment`.UID) AS 'counts' 
                  FROM `t_course` 
                  LEFT JOIN `t_enrolment` ON `t_enrolment`.`CID` = `t_course`.`CID` 
                  GROUP BY CID";


          $run = mysqli_query($db_connect, $sql);
          while ($result = mysqli_fetch_assoc($run)) {
            $startDate = '"' . $result["CourseDate"] . '"';
            $endDate = '"' . $result["CourseEnd"] . '"';

            $dateDiffQuery = "SELECT TIMESTAMPDIFF(WEEK,$startDate,$endDate)";
            $runDateDiff = mysqli_query($db_connect, $dateDiffQuery);
            $duration = mysqli_fetch_array($runDateDiff);


          ?>
            <tr>
              <td><?= $result["CourseTitle"] ?></td>
              <td><?php echo  $result["CourseDate"] ?></td>
              <td><?= $result["CourseEnd"] ?></td>
              <td><?= $duration[0] ?> Weeks</td>
              <td><?= $result["description"] ?></td>
              <td><?= $result["counts"] ?></td>
              <td><?= $result["CourseCapacity"] ?></td>
              <td><a href="edit.php?id=<?= $result["CID"] ?>&table=<?= $table ?>">EDIT</a></td>
              <td><a onclick="return confirm('Are you sure?')" href="delete.php?d=<?= $result["CID"] ?>&table=<?= $table ?>">Delete</a></td>
            </tr>

          <?php
          };
          ?>

        </tbody>

      </table>
    </div>
  </main><!-- /.container -->
</body>

</html>

<script>
  tableshowOrHideTable = (table) => {
    var table = document.getElementById(table);
    if (table.style.display === "none") {
      table.style.display = "block";
    } else {
      table.style.display = "none";
    }
  }
</script>