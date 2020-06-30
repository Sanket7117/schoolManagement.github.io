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
    <h1 style="text-align: center;padding: 50px;">INFO</h1>
</div>

<div  class="plain body">
    
    <a href="studenthomepage1.php" class="btn btn-primary pull-right" style="float: right; margin:10px">Back</a> 

<form method="post">
 <table class="table">
  
   <thead>
   
      <tr>
        <th>Name</th>
        <th>Subject</th>
        <th>Mobile No</th>
        <th>Email</th>
      </tr>  
  </thead>

  <tbody>
  <?php
        
    $query="select * from adminuser";
    $result=$conn->query($query);
    while($show=$result->fetch_assoc()) {   
  ?>

  <tr>

        <td><?php echo $show['username']  ?></td>
        <td><?php echo $show['subject']  ?></td>
        <td><?php echo $show['Mobil no']  ?></td>
        <td><?php echo $show['Email']  ?></td>
        
  </tr>
           
<?php } ?>
</tbody>



</table>

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