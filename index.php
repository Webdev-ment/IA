<?php

$IA_db = mysqli_connect("localhost", "root", ""); 
if (!$IA_db) {
    die(mysqli_error($IA_db));
  }
  if(mysqli_select_db($IA_db, "ia_proj")){
    //echo "Database connection sucessful!"; 
  }else{
  echo "Database connection unsuccessful";
  die(mysqli_error($IA_db));
  }
  

?>
<html>
<head>
<title>Home</title>
</head>
<nav class="navbar navbar-expand-sm bg-warning navbar-dark sticky-top" >
<ul class="navbar-nav" style="font-weight:bold;">
    <li class="nav-item active">
      <a class="nav-link" href="#" >Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Services</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About Us</a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li> -->
  </ul>

</nav>
<body class="bg-dark">
    <div class="p-d">  
        <div class="card right" style="background-color: ;">
            <div class="card-body">
                <h1 class="card-title" style="text-align: center; color: #8d0404">Login Here!</h1>
                <form action="" method="POST">
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Username</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">                     
                    </div>                     
                                        
                    <button type="submit" class="btn btn-warning">Login</button>
                </form>
  </div>


</body>
<footer class="bg-warning">
    <p>Group2</p>
</footer>
</html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="stylesheet.css">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
