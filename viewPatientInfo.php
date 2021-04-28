<?php
require_once ("PatientModel.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Patient Record</title>
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
<body class="patientbg" >
<h1>Patient Record</h1>
<?php 
  $Object = new PatientModel();
  $Object->get_all_Patients();
?>

  <h2>Delete Patient Record</h2>
      <form action="PatientController.php" method="POST">
          <input type="text" name="delete_ID" placeholder="Enter ID of Patient to be deleted">
          <input type="submit" name="delete" value="Delete">
      </form>

    <h2>Edit Patient Record</h2>
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
          Affliction: <input type="text" name="edit_affliction">

          <input type="submit" name="edit" value="Edit">
        </form>

</body>
<footer class="bg-warning">
    <p>Group2</p>
</footer>
</html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>