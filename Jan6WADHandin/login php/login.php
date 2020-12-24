<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Jasons Tempalte">
    <meta name="author" content="">
    <title>Login</title>
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet"crossorigin="anonymous">
    <!-- Favicons -->
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
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
      html,
body {
  height: 100%;
}
body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>
    <!-- Custom styles for this template -->
  </head>
  <body class="text-center">
   

    <form class="form-signin" method="POST" action="_auth.php">

  <?php
//user feedback
if (isset($_GET["e"])) {
        $e = $_GET["e"];
        if ($e == 1) {
                ?>
             <div class="alert alert-primary" role="alert">
  <strong>Holy guacamole!</strong> Error Number 1: Incorrect Login, please access to math lab
        </div>
        <?php
        }
        if ($e == 2) {
                     ?>
             <div class="alert alert-danger" role="alert">
  <strong>Holy guacamole!</strong> Error Number 2: ???????
        </div>
        <?php
        }
        if ($e == 3) {
?>

<img class="mb-4" src="https://cdn.shopify.com/s/files/1/0344/6469/files/angry.jpg?v=1560891349" alt="" width="600" height="300" style="  margin: auto;
  border: 3px solid green; transform:translateX(-100px)">
<?php
                echo ("Error Number 3");
        }
        if ($e == 4) {
                echo ("Error Number 4");
        }
        else{?>
                <img class="mb-4" src="https://i.imgflip.com/3a5wsr.jpg" alt="" width="72" height="72">
                <?php
         } 
}
?>
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" name = "email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="password"id="inputPassword" class="form-control" placeholder="Password" required>
   <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
</form>


</body>
</html>

<!-- old login page -->
<!-- <form method="POST" action="_auth.php">
        <input type="email" name="email" required placeholder="E-mail">
        <br>
        <input type="password" name="password" required placeholder="Password">
        <br>
        <button type="submit">LOGIN</button> -->


</form>