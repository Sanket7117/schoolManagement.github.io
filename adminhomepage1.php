<?php include_once("config.php"); ?>
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
        <a class="nav-link" href="#" style="color: navajowhite;">Notice</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: navajowhite;">Attendenct</a>
      </li>
      
     </ul>
      <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="color: navajowhite;">Search</button>
      <a class="nav-link" href="logoutadmin.php" style="color: navajowhite;">Logout</a>
    </form>
  </div>
</nav>
<?php 
    
    $sql = "SELECT * FROM `users`";
    $connStatus = $conn->query($sql);
    $numberOfRows = mysqli_num_rows($connStatus);
?>

 <div class="card-deck">
  <div class="card">
    <h1 style="background-color:#ffc107;height: 150px;width: auto; text-align:center">Total Number of Student</h1>
    <div class="card-body" style="background-color: aliceblue;height: 100px;width: auto;">
      <h1 style="float: center;" class="card-title"><?php echo "$numberOfRows "?></h1>
    </div>
  </div>
  
  <div class="card">
    <h1 style="background-color:rgba(0, 123, 255, 0.71);height: 150px;width: auto; text-align:center">Add Attendence</h1>
    <div class="card-body" style="height: 100px;width: auto;background-color: aliceblue;" >
    <a class="btn btn-primary" href="Attendance.php" role="button" style="width:150px; float: middle;background-color:rgba(0, 123, 255, 0.71);">ADD</a>
  </div>
    
  </div>
  <div class="card">
    <h1 style="background-color: #d39e00;height: 150px;width: auto;text-align:center">Add Result</h1>
    <div class="card-body" style="height: 100px;width: auto; background-color: aliceblue;">
    <a class="btn btn-primary" href="Result.php" role="button" style="width:150px; float:middle ;background-color: #d39e00;">ADD</a>
  </div>

  <style>
    .card-deck {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
    margin-right: -1px;
    margin-left: -1px;
    margin-top: 20px;
    }
  </style> 



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html> 