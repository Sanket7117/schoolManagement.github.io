
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

<?php include_once("config.php"); 
$rollno = $Science = $Maths = $Name = $English = "";
$rollno_err = $Science_err = $Maths_err = $English_err = $Name_err = "";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  
  if(empty($_POST['rollno'])){
    $rollno_err = "course cannot be blank";
  }
  
  else{
    $rollno = ($_POST['rollno']);
  }
  // If there were no errors, go ahead and insert into the database
  if(empty($rollno_err) )
  {
    $sql = "SELECT rollno FROM result WHERE rollno = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "s", $param_Rollno);
  
        // Set these parameters
        $param_Rollno = $rollno;
  
        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
          $course = ($_POST['rollno']);
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    } 
    else{
      echo "Something went wrong... cannot redirect rollno.........";
    }    
    mysqli_stmt_close($stmt);
  }
  


  if(empty($_POST['Name'])){
    $Name_err = "course cannot be blank";
  }
  
  else{
    $Name = ($_POST['Name']);
  }
  // If there were no errors, go ahead and insert into the database
  if(empty($Name_err) )
  {
    $sql = "SELECT rollno FROM result WHERE Name = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "s", $param_Name);
  
        // Set these parameters
        $param_Name = $Name;
  
        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
          $Name = ($_POST['Name']);
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    } 
    else{
      echo "Something went wrong... cannot redirect Name.........";
    }    
    mysqli_stmt_close($stmt);
  }

  
  
  if(empty($_POST['English'])){
    $English_err = "course cannot be blank";
  }
  
  else{
    $English = ($_POST['English']);
  }
  // If there were no errors, go ahead and insert into the database
  if(empty($English_err) )
  {
    $sql = "SELECT rollno FROM result WHERE English = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "s", $param_English);
  
        // Set these parameters
        $param_English = $English;
  
        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
          $English = ($_POST['English']);
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    } 
    else{
      echo "Something went wrong... cannot redirect English.........";
    }    
    mysqli_stmt_close($stmt);
  }



  if(empty($_POST['Maths'])){
    $Maths_err = "course cannot be blank";
  }
  
  else{
    $Maths = ($_POST['Maths']);
  }
  // If there were no errors, go ahead and insert into the database
  if(empty($Maths_err) )
  {
    $sql = "SELECT rollno FROM result WHERE Maths = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "s", $param_Maths);
  
        // Set these parameters
        $param_Maths = $Maths;
  
        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
          $Maths = ($_POST['Maths']);
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    } 
    else{
      echo "Something went wrong... cannot redirect Maths.........";
    }    
    mysqli_stmt_close($stmt);
  }



  if(empty(trim($_POST['Science']))){
    $Science_err = "Zip cannot be blank";
  }
  
  else{
    $Science = ($_POST['Science']);
  }
  
  
  // If there were no errors, go ahead and insert into the database
  if(empty($rollno_err) && empty($Name_err) && empty($English_err) && empty($Maths_err) && empty($Science_err))
  {
    $sql = "INSERT INTO result (rollno , Name , English , Maths , Science,total,percentage) VALUES (?, ?, ?, ?, ?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sssssss", $param_Rollno, $param_Name , $param_English , $param_Maths , $param_Science, $param_total, $param_Percentage);
        // Set these parameters
        $param_Rollno = $rollno;
        $param_Name = $Name;
        $param_English = $English;
        $param_Maths = $Maths;
        $param_Science = $Science;
        $param_total= ($English + $Maths +$Science);
        $param_Percentage = (($param_total/300)*100);
    }
    if (mysqli_stmt_execute($stmt))
    {
      echo "<div class='alert alert-success'>

           Result Uploded sucessfully!!
      </div>";
      
    }
    else{
        echo "Something went wrong... cannot redirect!";
    }
    mysqli_stmt_close($stmt); 
  }
  else{
    echo "Something went wrong... cannot redirect ZIP.........";
  } 




 



}
?>


<form method="POST" style="max-width: 500px;
  margin: auto; padding:50px ">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Rollno</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="rollno">
    </div>
  </div>

<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="inputEmail3"  name="Name">
    </div>
  </div>


  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">English</label>
    <div class="col-sm-10">
       <input type="text" class="form-control" id="inputEmail3" name="English">
    </div>
  </div>
    
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Maths</label>
    <div class="col-sm-10">
       <input type="text" class="form-control" id="inputEmail3" name="Maths">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Science</label>
    <div class="col-sm-10">
       <input type="text" class="form-control" id="inputEmail3" name="Science">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">ADD Result</button>
    </div>
  </div>
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>