<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
</head>
<nav class=" navi navbar navbar-expand-sm  sticky-top" >
<div class="">
    <a class="navbar-brand" href="./index.php">
      <img src="./EMR_S.png" alt="" width="200px" height="50px">
    </a>
</div>
<ul class="navbar-nav" style="font-weight:bold;">
    <li class="nav-item active">
      <a class="nav-link" href="./index.php" >Home</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="./registration.php">Register</a>
    </li>
    <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Patients
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="./AddPatientInfo"><b>Create Patient Records</b></a>
          <a class="dropdown-item" href="./viewPatientInfo"><b>View Patient Records</b></a>
          <a class="dropdown-item" href="#"><b>Edit Patient Record</b></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" style="color: red;"><b>Delete Patient Records</b></a>
        </div>
      </li>

  </ul>
  

</nav>

</nav>


<body class="bg-dark registerbg" >

<form action="./register.php" method="POST" >

<div class="py-3">  
<div class="container" style="width: 800px;">
    <h1>Register Here!</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="fname"><b>First Name</b></label>
    <input type="text" name="fname" placeholder="First Name">
    <?php if(!empty($_SESSION["register_errors"]["Required"])) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    Please enter all fields.
    </div>
    <?php endif; ?>

    <label for="lname"><b>Last Name</b></label>
    <input type="text" name="lname" placeholder="Last Name">
    <?php if(!empty($_SESSION["register_errors"]["Required"])) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    Please enter all fields.
    </div>
    <?php endif; ?>

    <label for="address"><b>Address</b></label>
    <input type="text" name="address" placeholder="Address">
    <?php if(!empty($_SESSION["register_errors"]["Required"])) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    Please enter all fields.
    </div>
    <?php endif; ?>

    <label for="email"><b>Email Address</b></label>
    <input type="text" name="email" id="" placeholder="Email Address">
    <?php if(!empty($_SESSION["register_errors"]["Required"])) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    Please enter all fields.
    </div>
    <?php endif; ?>
    <?php if(!empty($_SESSION["register_errors"]["Email"])) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    Email already taken.
    </div>
    <?php endif; ?>

    <label for="phone"><b>Phone</b></label>
    <input type="text" name="phone" placeholder="Phone Number">
    <?php if(!empty($_SESSION["register_errors"]["Required"])) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    Please enter all fields.
    </div>
    <?php endif; ?>

    <label for="occupations" class="form-label"><b>Occupation</b></label>
    <input class="form-control" list="datalistOptions" name="datalistOptions" id="exampleDataList" placeholder="Type to search...">
        <datalist id="datalistOptions">
            <option value="Doctor" >
            <option value="Receptionist">
        </datalist> <br>
    <?php if(!empty($_SESSION["register_errors"]["Occupation"])) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    Please select an occupation.
    </div>
    <?php endif; ?>
    
    <label for="psw"><b>Password</b></label>
    <input type="password" name="password" id="" placeholder="Password">
    <?php if(!empty($_SESSION["register_errors"]["Required"])) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    Please enter all fields.
    </div>
    <?php endif; ?>
    <?php if(!empty($_SESSION["register_errors"]["Strength"])) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    Password is not strong enough. Must contain the following: A minimum length of 8 characters, at least one digit, special character and uppercase letter.
    </div>
    <?php endif; ?>
    

    <label for="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" name="confirm" id="" placeholder="Confirm Password">
    <?php if(!empty($_SESSION["register_errors"]["Required"])) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    Please enter all fields.
    </div>
    <?php endif; ?>
    <?php if(!empty($_SESSION["register_errors"]["Password"])) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    Password and Confirm Password must be the same.
    </div>
    <?php endif; ?>

    <button type="submit" value="Sign Up" class="btn btn-warning registerbtn">Register</button>
  </div>
<br>
  
  <div class="container signin py-2">
    <p>Already have an account? <a href="./index.php">Sign in</a>.</p>
  </div>

  <br><br>

</div>
</form>

   
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
