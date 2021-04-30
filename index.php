<html>
<head>
<title>Home</title>
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
<body class="body-bg ">
    <div class="p-d">  
        <div class="card right" style="background-color:white; width: 400px;">
            <div class="card-body">
                <h1 class="card-title" style="text-align: center; color: #8d0404">Login Here!</h1>
                <form action="./login.php" method="POST">
                    <div class="form-group" >
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" id="">                     
                    </div>  
                    <div class="form-group">
                        <label for="" class="form-label">Occupation</label>
                        <input class="form-control" list="datalistOptions" name="datalistOptions" id="" placeholder="Type to search...">
                        <datalist id="datalistOptions">
                          <option value="Doctor">
                          <option value="Receptionist">
                        </datalist>
                    </div>

                    <!-- <input type="radio" name="user"  value="receptionist" id=""> Receptionist <br> <br>
                    <input type="radio" name="user" value="doctor" id=""> Doctor -->
                    <br>
                    <button type="submit" class="btn btn-warning">Login</button>
                    
                </form>
               
  </div>
  
</body>
<!-- <footer class="bg-warning">
    <p>Group2</p>
</footer> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>

