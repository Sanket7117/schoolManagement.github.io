<?php include_once("config.php"); ?>
<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location:Student login.php");
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
<div class="overflow-auto" id="#exampleModalLong">
<div class="panel panel-default container">

<div class="panel-heading">
    <h1 style="text-align: center;padding: 50px;">Result</h1>
</div>
<form method="post">
<div  class="plain body">
<input type="text" name="username"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Roll No">
<button type="submit" class="btn btn-primary" style="margin:10px;">Show Result</button>



 <table class="table">
  
   <thead>
   
      <tr>
        <th>Roll no</th>
        <th>Name</th>
        <th>English</th>
        <th>Maths</th>
        <th>Science</th>
        <th>Total</th>
        <th>Percentage</th>
      </tr>  
  </thead>

  <tbody>
  <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = trim($_POST['username']);
    
    $query="select * from result WHERE rollno='$username'";
    $result=$conn->query($query);
    while($show=$result->fetch_assoc()) {   
  ?>

  <tr>

        <td><?php echo $show['rollno']  ?></td>
        <td><?php echo $show['Name']  ?></td>
        <td><?php echo $show['English']  ?></td>
        <td><?php echo $show['Maths']  ?></td>
        <td><?php echo $show['Science']  ?></td>
        <td><?php echo $show['total']  ?>/300</td>
        <td><?php echo $show['percentage']  ?>%</td>
  </tr>
           
<?php } } ?>
</tbody>



</table>
<a class="btn btn-primary" href="studenthomepage1.php" role="button" style="width:150px; float:middle ;">Back</a>
</form> 
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>