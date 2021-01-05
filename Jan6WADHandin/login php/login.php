<!doctype html>

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

<html lang="en">


<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Jasons Tempalte">
  <meta name="author" content="">
  <title>Login</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <!-- Favicons -->
  <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#563d7c">
  <!-- Custom styles for this template -->
</head>

<body class="text-center">
  <div class="navbar fixed-top navbar-light bg-primary">
    <h2 class="text-left">Staff Development
      <div class="font-weight-light ">Helping you meet your goals!</div>
    </h2>
    <img class="rounded" src="img/Assessment Company Logo.png">
  </div>

  <!-- CALLS Auth page on form submission -->
  <form class="form-signin" method="POST" action="_auth.php">

    <?php
    //user feedback
    //get read url parameters
    if (isset($_GET["e"])) {
      $e = $_GET["e"];
      if ($e == 1) {
    ?>
        <div class="alert alert-danger" role="alert">
          You are not logged in on the right account
        </div>
      <?php
      }
      else if ($e == 2) {
      ?>
        <div class="alert alert-danger" role="alert">
          No Username/Password Entered
        </div>
      <?php
      }
      else if ($e == 3) {
      ?>
        <div class="alert alert-danger" role="alert">
          No matching details found
        </div>
      <?php
      }
      else if ($e == 4) { ?>
        <div class="alert alert-primary" role="alert">
          Succesfully Logged Out
        </div>
      <?php
      } else {
        echo ("Unknown Error, Try again"); 
      }
    }
    ?>
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autocomplete="email">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" autocomplete="current-password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>

</body>
<div class="fixed-bottom">Please contact your company network administrator to get started</div>

</html>