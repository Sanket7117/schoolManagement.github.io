<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    //header("location: homepage1.php");
    //exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT * FROM adminuser WHERE username = '$username' AND password = '$password'";
    $stmt = mysqli_prepare($conn, $sql);
    //mysqli_stmt_bind_param($stmt, "s", $param_username);
    //$param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
       mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                      // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: adminhomepage1.php ");
                            
                        }
                    }
                }
    
    else{
      echo "jghsdjdbkaa";
    }
}





?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>MyCaptain</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a href="homepage1.php" class="pull-left"><img src="MyCaptain.png"></a> 
  <a class="navbar-brand mb-0 h1" href="#" style="color: navajowhite;">MyCaptain</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="homepage1.php" style="color: navajowhite;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: navajowhite;">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: navajowhite;">
          Login
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="student login.php">Student Login</a>
          <a class="dropdown-item" href="admin login.php">Admin Login</a>
        </div>
      
     </ul>
      <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="color: navajowhite;">Search</button>
    </form>
  </div>
</nav>
  

<div class="login-box">
<h1 style="color: #020202">Admin Login:</h1>

<form action="" method="post">
  <div class="textbox">
  <i class="fa fa-user"></i>
    <label for="exampleInputEmail1"></label>
    <input type="text" name="username"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
  </div>
  <div class="textbox">
  <i class="fa fa-lock"></i>
    <label for="exampleInputPassword1"></label>
    <input type="password" name="password" id="exampleInputPassword1" placeholder="Enter Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1" style="color:black;">Check me out</label>
  </div>
  <button type="submit" class="btn1">Sign in</button>
</form>
</div>

   
   
    <style>
      @import "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
  body {
    margin: 0;
    padding: 0;
    
    font-family: sans-serif;
    background-size: cover;
    
  }
  .login-box{
    width: 280px;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%, -50%);
  }
  .login-box h1{
    float: left;
    font-size: 40px;
    border-bottom: 6px solid #070807;
    margin-bottom: 50px;
    padding: 13px 0;
  }
  .textbox{
    width: 100%;
    overflow: hidden ;
    font-size: 20px;
    padding: 8px 0;
    margin: 8px 0;
    border-bottom: 1px solid #4caf50;
  }
  .textbox i{
    width: 26px;
    float: left;
    text-align: center;
    color: black;
  }
  .textbox input{
    border: none;
    outline: none;
    background: none;
    color: black;
    font-size: 18px;
    width: 80%;
    float: left;
    margin: 0 10px;
  }
  .btn1{
    width: 100%;
    background: none;
    border: 2px solid #4caf50;
    padding: 5px;
    color: black;
    font-size: 100%;
  }
  ::placeholder{
    color: black;
  }
 
</style> 
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>