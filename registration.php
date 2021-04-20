<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<nav class="navbar navbar-expand-sm bg-warning navbar-dark sticky-top" >
<ul class="navbar-nav" style="font-weight:bold;">
    <li class="nav-item active">
      <a class="nav-link" href="./index.php" >Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./registration.php">Register</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Services</a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li> -->
  </ul>

</nav>
<body class="bg-dark registerbg" >

<form action="./register.php" method="POST">
<div class="py-3">  
  <div class="container">
    <h1>Register Here!</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="fname"><b>First Name</b></label>
    <input type="text" name="fname" placeholder="First Name">

    <label for="lname"><b>Last Name</b></label>
    <input type="text" name="lname" placeholder="Last Name">

    <label for="address"><b>Address</b></label>
    <input type="text" name="address" placeholder="Address">

    <label for="email"><b>Email Address</b></label>
    <input type="text" name="email" id="" placeholder="Email Address">

    <label for="phone"><b>Phone</b></label>
    <input type="text" name="phone" placeholder="Phone Number">

    <label for="occupations" class="form-label"><b>Occupation</b></label>
    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
        <datalist id="datalistOptions">
            <option name="user" value="Doctor" >
            <option name="user" value="Receptionist">
        </datalist> <br>
    
    <label for="psw"><b>Password</b></label>
    <input type="password" name="password" id="" placeholder="Password">

    <label for="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" name="confirm" id="" placeholder="Confirm Password">

    <button type="submit" value="Sign Up" class="btn btn-warning registerbtn">Register</button>
  </div>

  
  <div class="container signin py-3">
    <p>Already have an account? <a href="./index.php">Sign in</a>.</p>
  </div>

  <br><br>

</div>
</form>

   
</body>
<footer class="bg-warning">
    <p>Group2</p>
</footer>
</html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="stylesheet.css">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
