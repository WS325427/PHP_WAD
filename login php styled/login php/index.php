<!-- 
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
</style> -->
<style>
    #logout{
        font-size: 20px;
        background-color: orange;
        font-weight: bold;
    }
</style>


<?php 
include_once("_login_check.php");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="DTEE">
    <title>DEETS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Favicons -->

<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
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
    </style>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<main role="main" class="container">


<!-- <h1 class="title">DEEETS</h1> -->
<button id="Log Out"><a href="logout.php"><div>LOG Out</div> </a></button>
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



<table class="table table-bordered table-striped">
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

</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script></body>
</html>