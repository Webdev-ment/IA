<?php
require_once ("PatientModel.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Record</title>
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
<body class="bg-light" >
<h1><center>Patient Record</center></h1>
<br>
<?php 
  $Object = new PatientModel();
  $Object->get_all_Patients();
?>

<div class="container-sm mx-auto" style="width: 400px;">

    <div class="card text-warning bg-dark">
    <div class="card-header">
    <h5 class="card-title">Delete Patient Record</h5>
    </div>
    <div class="card-body">
        <!-- <h5 class="card-title">Delete Patient Record</h5> -->
        <form action="PatientController.php" method="POST">
            <input type="text" name="delete_ID" placeholder="Enter ID of Patient to be deleted">
            <!-- <input type="submit" name="delete" value="Delete"> -->
        </form>
        <button type="submit" name="delete" value="Delete" class="btn btn-danger">Delete</button>
    </div>
    </div>

</div>

<br><br>

<div class="container-sm mx-auto " style="width: 1000px; ">

    <div class="card border border-success ">
    <div class="card-header">
    <h5 class="card-title">Edit Patient Record</h5>
    </div>
    <div class="card-body mt-0">
        <!-- <h5 class="card-title">Delete Patient Record</h5> -->
        <form action="PatientController.php" method="POST">
        <div class="form-group row">
            <div class="col-sm-4">
            <label for=""><b>ID</b></label>
            <input type="text" name="edit_ID" placeholder="Eg. 0 ">
            </div>

            <div class="col-sm-4">
            <label for="fname"><b>First Name</b></label>
            <input type="text" name="edit_fname" placeholder="Eg. Mary">
            </div>

            <div class="col-sm-4">
            <label for="lname"><b>Last Name</b></label>
            <input type="text" name="edit_lname" placeholder="Eg. Doe">
            </div>

            <div class="col-sm-4">
            <label for="gender"><b>Gender</b></label>
            <input type="text" name="edit_gender" placeholder="Eg. Female"></input>
            </div>

            <div class="col-sm-4">
            <label for="dob"><b>Date of Birth</b></label> <br>
            <input type="date" name="edit_dob" placeholder="Eg. 02/12/2008"><!-- Format: YYYY-MM-DD --></input>
            </div>

            <div class="col-sm-4">
            <label for="age"><b>Age</b></label>
            <input type="text" name="edit_age" placeholder="Eg. 12"></input>
            </div>

            <div class="col-sm-4">
            <label for="address"><b>Address</b></label>
            <input type="text" name="edit_address" placeholder="Eg. 12 Rose Street"></input>
            </div>

            <div class="col-sm-4">
            <label for="email"><b>Email Address</b></label>
            <input type="text" name="edit_email" id="" placeholder="Eg. sasha123@gmail.com"></input>
            </div>

            <div class="col-sm-4">
            <label for="phone"><b>Phone</b></label>
            <input type="text" name="edit_phone" placeholder="Eg. 1876-222-3333"></input>
            </div>

            <div class="col-sm-12">
            <label for="affiction"><b>Affliction</b></label>
            <input type="text" name="edit_affliction" placeholder="Eg. Fractured Bones, High Fever"></input>
            </div>



        </div>
        <!-- <button type="submit" name="" value="" class="btn btn-success">Update</button> -->

        <!-- ID: <input type="text" name="edit_ID" placeholder="Enter ID of Patient to be edited">
          First Name: <input type="text" name="edit_fname">
          Last Name: <input type="text" name="edit_lname">
          Gender: <input type="text" name="edit_gender">
          Date of Birth: <input type="date" name="edit_dob">
          Age: <input type="text" name="edit_age">
          Address: <input type="text" name="edit_address">
          Email: <input type="text" name="edit_email">
          Phone: <input type="text" name="edit_phone">
          Affliction: <input type="text" name="edit_affliction"> -->
        </form>
        <button type="submit" name="" value="" class="btn btn-success">Update</button>
    </div>
    </div>

</div>

<br><br>

  <!-- <h3>Delete Patient Record</h3>
      <form action="PatientController.php" method="POST">
          <input type="text" name="delete_ID" placeholder="Enter ID of Patient to be deleted">
          <input type="submit" name="delete" value="Delete">
      </form> -->

    <!-- <h3>Edit Patient Record</h3>
      <form action="PatientController.php" method="POST">
          ID: <input type="text" name="edit_ID" placeholder="Enter ID of Patient to be edited">
          First Name: <input type="text" name="edit_fname">
          Last Name: <input type="text" name="edit_lname">
          Gender: <input type="text" name="edit_gender">
          Date of Birth: <input type="date" name="edit_dob">
          Age: <input type="text" name="edit_age">
          Address: <input type="text" name="edit_address">
          Email: <input type="text" name="edit_email">
          Phone: <input type="text" name="edit_phone">
          Affliction: <input type="text" name="edit_affliction"> -->


</body>
<footer class="bg-warning">
    <p>Group2</p>
</footer>
</html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>