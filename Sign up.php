<?php
require_once "config.php";
// USERNAME
$username = $password = $confirm_password = $course = $City = $State = $Zip = $gender = $id = "";
$username_err = $password_err = $confirm_password_err = $course_err =  $City_err = $State_err = $Zip_err = $gender_err ="";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }   
      mysqli_stmt_close($stmt);
}
   
    
    

//PASSWORD
// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 8){
    $password_err = "Password cannot be less than 8 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if( empty($password_err) && empty($confirm_password_err))
{
    $sql = "SELECT id FROM users WHERE password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "s",  $param_password);

        // Set these parameters
        
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
          $password = trim($_POST['password']);
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    else{
      echo "Something went wrong... cannot redirect password.........";
    }    
    mysqli_stmt_close($stmt);
} 
else{
  echo "Something went wrong... cannot redirect password!";
}
   

// Check for course
if(empty($_POST['course'])){
  $course_err = "course cannot be blank";
}

else{
  $gender = ($_POST['course']);
}
// If there were no errors, go ahead and insert into the database
if(empty($course_err) )
{
  $sql = "SELECT username FROM users WHERE course = ?";
  $stmt = mysqli_prepare($conn, $sql);
  if ($stmt)
  {
      mysqli_stmt_bind_param($stmt, "s", $param_course);

      // Set these parameters
      $param_course = $course;

      // Try to execute the query
      if (mysqli_stmt_execute($stmt))
      {
        $course = ($_POST['course']);
      }
      else{
          echo "Something went wrong... cannot redirect!";
      }
  } 
  else{
    echo "Something went wrong... cannot redirect course.........";
  }    
  mysqli_stmt_close($stmt);
}
else{
  echo "Something went wrong... cannot redirect course!";
}


// Check for gender
if(empty($_POST['gender'])){
  $gender_err = "gender cannot be blank";
}

else{
  $gender = ($_POST['gender']);
}


// If there were no errors, go ahead and insert into the database
if(empty($gender_err) )
{
  $sql = "SELECT username FROM users WHERE gender = ?";
  $stmt = mysqli_prepare($conn, $sql);
  if ($stmt)
  {
      mysqli_stmt_bind_param($stmt, "s", $param_gender);

      // Set these parameters
      $param_gender = $gender;

      // Try to execute the query
      if (mysqli_stmt_execute($stmt))
      {
        $gender = ($_POST['gender']);
      }
      else{
          echo "Something went wrong... cannot redirect!";
      }
  } 
  else{
    echo "Something went wrong... cannot redirect gender.........";
  }    
  mysqli_stmt_close($stmt);
}
else{
  echo "Something went wrong... cannot redirect gender!";
}

//CITY
if(empty($_POST['City'])){
  $City_err = "City cannot be blank";
}

else{
  $City = ($_POST['City']);
}


// If there were no errors, go ahead and insert into the database
if(empty($City_err) )
{
  $sql = "SELECT id FROM users WHERE City = ?";
  $stmt = mysqli_prepare($conn, $sql);
  if ($stmt)
  {
      mysqli_stmt_bind_param($stmt, "s", $param_City);

      // Set these parameters
      $param_City = $City;

      // Try to execute the query
      if (mysqli_stmt_execute($stmt))
      {
        $City = ($_POST['City']);
      }
      else{
          echo "Something went wrong... cannot redirect!";
      }
      mysqli_stmt_close($stmt);
  }
  else{
    echo "Something went wrong... cannot redirect City.........";
  }  
}
else{
  echo "Something went wrong... cannot redirect City!";
}

//State
if(empty($_POST['State'])){
  $State_err = "City cannot be blank";
}

else{
  $State = ($_POST['State']);
}
// If there were no errors, go ahead and insert into the database
if(empty($State_err))
{
  $sql = "SELECT id FROM users WHERE State = ?";
  $stmt = mysqli_prepare($conn, $sql);
  if ($stmt)
  {
      mysqli_stmt_bind_param($stmt, "s", $param_State);

      // Set these parameters
      $param_State = $State;

      // Try to execute the query
      if (mysqli_stmt_execute($stmt))
      {
        $State = ($_POST['State']);
      }
      else{
          echo "Something went wrong... cannot redirect!";
      }
     mysqli_stmt_close($stmt);
  }
  else{
    echo "Something went wrong... cannot redirect State.........";
  }  
}
  else{
    echo "Something went wrong... cannot redirect State!";
  }


//ZIP
if(empty(trim($_POST['Zip']))){
  $Zip_err = "Zip cannot be blank";
}

else{
  $Zip = ($_POST['Zip']);
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($City_err) && empty($confirm_password_err) && empty($course_err) && empty($State_err) && empty($Zip_err) && empty($gender_err) )
{
  $sql = "INSERT INTO users (username, password, course ,Gender, City , State, Zip) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  if ($stmt)
  {
      mysqli_stmt_bind_param($stmt, "sssssss", $param_username, $param_password, $param_course, $param_gender, $param_City, $param_State, $param_Zip);
      // Set these parameters
      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT);
      $param_course = $course;
      $param_gender = $gender;
      $param_City = $City;
      $param_State = $State;
      $param_Zip = $Zip;

      // Try to execute the query
      if (mysqli_stmt_execute($stmt))
      {
          header("location: adminhomepage1.php");
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
else{
    echo "Something went wrong... cannot redirect Zip!";
}

mysqli_close($conn);
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

    <title>MyCaption</title>
  </head>
  
 
  

  <style>
  body {
    
    background-repeat: no-repeat;
    height: 100%;
    background-size: cover;
    background-position: center;
}
::placeholder{
    color: black;
}
.from-group1{
  padding-top: 15px;
  
}
 
</style>
 </div>
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

<div class="container mt-4">
<h3 style="color:black">Add Student:</h3>
<hr>
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4" style="color:black">Username</label>
      <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4" style="color:black">Password</label>
      <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6 ">
      <label for="inputPassword4" style="color:black">Confirm Password</label>
      <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password">
    </div>
    <div class="from-group col-md-6">
    <label for="inputPassword4" style="color:black">Course</label>
      <select class="selectpicker form-control" name="course">
        <option name="course" value="Maths">MATHS</option>
        <option name="course" value="Science">SCIENCE</option>
        <option name="course" value="English">ENGLISH</option>
      </select>
    </div>
  </div>

  
  <div class="container">
   <p style="color:black">Gender</p>
  
   <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="gender1" value="Male" checked>
  <label class="form-check-label" for="gender1">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="gender2" value="Female">
  <label class="form-check-label" for="gender2">
    Female
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="gender3" value="other" >
  <label class="form-check-label" for="gender3">
    Other
  </label>
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity" style="color:black">City</label>
      <input type="text" class="form-control" name ="City" id="inputCity" placeholder="City">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState" style="color:black">State</label>
      <input type="text" class="form-control" name ="State" id="inputState" placeholder="State">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip" style="color:black">Zip</label>
      <input type="text" class="form-control" id="inputZip" name="Zip">
    </div>
  </div>
</div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out for confirm
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>