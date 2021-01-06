<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<?php
include_once("user_login_check.php");
//connects to db
include_once("_connect.php");
$UID = $_SESSION["UID"]
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
  <title>User Page</title>

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
    <?php $table = "t_course"; ?>

    <h2>Available Courses
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
            <th class="table">Spaces Available</th>
            <th class="table">Capacity</th>
            <th class="table">Enrol</th>

          </tr>
        </thead>
        <tbody>
          <?php

          // https://stackoverflow.com/questions/367863/sql-find-records-from-one-table-which-dont-exist-in-another
          $sql = "SELECT * FROM
          (SELECT`t_course`.`CID`, COUNT(`t_enrolment`.UID) AS 'counts'
          FROM `t_course`
          LEFT JOIN `t_enrolment` ON `t_enrolment`.`CID` = `t_course`.`CID`
          GROUP BY CID ) 
          AS T1
      RIGHT JOIN
         (SELECT `t_course`.`CID`,`CourseTitle`,CourseDate,CourseEnd,description,CourseCapacity
          FROM `t_course`
          LEFT JOIN `t_enrolment` ON `t_course`.`CID` = `t_enrolment`.`CID` AND `t_enrolment`.`UID` = $UID
          WHERE `t_enrolment`.`CID` IS NULL) 
          AS T2
      ON `T1`.`CID` = `T2`.`CID`";





          $run = mysqli_query($db_connect, $sql);

          // $runEnrolement = mysqli_query($db_connect, $sqlEnrolment);

          //mysqli_fetch_array($run)) causing issues when joining tables of the same column name with this method 
          //manually have to apply id by finding the correct associated index
          while ($result = mysqli_fetch_array($run)) {
            $startDate = '"' . $result["CourseDate"] . '"';
            $endDate = '"' . $result["CourseEnd"] . '"';

            $dateDiffQuery = "SELECT TIMESTAMPDIFF(WEEK,$startDate,$endDate)";
            $runDateDiff = mysqli_query($db_connect, $dateDiffQuery);
            $duration = mysqli_fetch_array($runDateDiff);
            if (($result["CourseCapacity"] -  $result["counts"]) <= 0) {
              $result[0] = NULL;
            };

          ?>
            <tr>
              <td><?= $result["CourseTitle"] ?></td>
              <td><?php echo  $result["CourseDate"] ?></td>
              <td><?= $result["CourseEnd"] ?></td>
              <td><?= $duration[0] ?> Weeks</td>
              <td><?= $result["description"] ?></td>
              <td><?= $result["CourseCapacity"] - $result["counts"] ?></td>
              <td><?= $result["CourseCapacity"] ?></td>
              <td><a onclick="return confirm('Are you sure?')" href="enrol.php?d=<?= $result[0] ?>">Enrol</a></td>
            </tr>

          <?php
          };
          ?>

        </tbody>

      </table>
    </div>
    <?php $table = "t_course"; ?>
    <h2>Enrolled Courses
    </h2>

    <button onclick="tableshowOrHideTable(`enrolledTable`)">Show/Hide</button>
    <!-- <h1 class="title">DEEETS</h1> -->
    <!-- //shows the format data is returned
//var_dump($run)
//tr = table row -->
    <div id="enrolledTable">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="table">Course Title</th>
            <th class="table">Start Date</th>
            <th class="table">End Date</th>
            <th class="table">Duration</th>
            <th class="table">Description</th>
            <th class="table">Spaces Available</th>
            <th class="table">Capacity</th>
            <th class="table">Leave</th>

          </tr>
        </thead>
        <tbody>
          <?php


          $sql = "SELECT * FROM
            (SELECT`t_course`.`CID`, COUNT(`t_enrolment`.UID) AS 'counts'
            FROM `t_course`
            LEFT JOIN `t_enrolment` ON `t_enrolment`.`CID` = `t_course`.`CID`
            GROUP BY CID ) 
            AS T1
            RIGHT JOIN
            (SELECT `t_course`.`CID`,`CourseTitle`,`CourseDate`,`CourseEnd`,`description`,`CourseCapacity`,`EID`
            FROM `t_course`
            LEFT JOIN `t_enrolment` ON t_course.`CID` = `t_enrolment`.`CID`
                  AND `t_enrolment`.`UID`=$UID) 
            AS T2
            ON `T1`.`CID` = `T2`.`CID`
            WHERE `T2`.`EID` IS NOT NULL";

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
              <td><?= $result["CourseCapacity"] -  $result["counts"] ?></td>
              <td><?= $result["CourseCapacity"] ?></td>
              <td><a onclick="return confirm('Are you sure?')" href="unenrol.php?d=<?= $result["EID"] ?>&table=<?= $table ?>">Leave</a></td>
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

  confirmed = () => {
    return confirm('Are you sure?')
  }
</script>