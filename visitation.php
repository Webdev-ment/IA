<?php
require_once ("VisitationModel.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
          <a class="dropdown-item" href="./AddPatientInfo.php"><b>Create Patient Records</b></a>
          <a class="dropdown-item" href="./viewPatientInfo.php"><b>View Patient Records</b></a>
          <a class="dropdown-item" href=""><b>Edit Patient Record</b></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" style="color: red;"><b>Delete Patient Records</b></a>
        </div>
      </li>

  </ul>
  

</nav>
<?php 
// $db_proj = mysqli_connect("localhost", "root", ""); 
// $db_proj ->query("INSERT INTO doctors(dct_ID, dct_fname, dct_lname) VALUES('$dct_ID', $dct_fname, '$dct_lname' )")
// or die($db_proj->error);

// if (!$db_proj) {
//     die(mysqli_error($db_proj));
// }
// if(mysqli_select_db($db_proj, "ia_proj")){
//     echo "Database connection sucessful!"; 
// }else{
//   echo "Database connection unsuccessful";
//   die(mysqli_error($db_proj));
// }

  $Object = new VisitationModel();
  $Object->get_all_Visitations();
?>
<body class="patientbg" >
<div class="container-sm mx-auto" style="width: 400px;">

    <div class="card text-warning bg-dark">
    <div class="card-header">
    <h5 class="card-title">Delete Visitation Record</h5>
    </div>
    <div class="card-body">
        <!-- <h5 class="card-title">Delete Patient Record</h5> -->
        <form action="VisitationController.php" method="POST">
            <input type="text" name="delete_ID" placeholder="Enter ID of Patient to be deleted">
            <!-- <input type="submit" name="delete" value="Delete"> -->
        </form>
        <button type="submit" name="delete" value="delete" class="btn btn-danger">Delete</button>
    </div>
    </div>

</div>

<br><br>

<div class="container-sm mx-auto " style="width: 1000px; ">

    <div class="card border border-success ">
    <div class="card-header">
    <h5 class="card-title">Edit Visitation Record</h5>
    </div>
    <div class="card-body mt-0">
        <!-- <h5 class="card-title">Delete Patient Record</h5> -->
        <form action="VisitationController.php" method="POST">
        <div class="form-group row">
            <div class="col-sm-4">
            <label for=""><b>Visitation ID</b></label>
            <input type="text" name="pat_ID" placeholder="Eg. 0 ">
            </div>

            <div class="col-sm-4">
            <label for=""><b>Patient ID</b></label>
            <input type="text" name="edit_fname" placeholder="Eg. Mary">
            </div>

            <div class="col-sm-4">
            <label for=""><b>Doctor ID</b></label>
            <input type="text" name="dct_ID" placeholder="Eg. Doe">
            </div>

            <div class="col-sm-4">
            <label for=""><b>Visitation Drug</b></label>
            <input type="text" name="vst_Drug" placeholder="Eg. Doe">
            </div>

            <div class="col-sm-4">
            <label for=""><b>Visitation Date</b></label>
            <input type="date" name="vst_Date" placeholder="Eg. Doe">
            </div>

            <div class="col-sm-4">
            <label for=""><b>Visitation Comment</b></label>
            <input type="text" name="vst_Comment" placeholder="Eg. Doe">
            </div>

        </div>
        
        </form>
        <button type="submit" name="edit" value="edit" class="btn btn-success">Update</button>
    </div>
    </div>

</div>

<br><br>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>