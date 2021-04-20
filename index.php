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
<body class="body-bg bg-dark">
    <div class="p-d">  
        <div class="card right" style="background-color:white;">
            <div class="card-body">
                <h1 class="card-title" style="text-align: center; color: #8d0404">Login Here!</h1>
                <form action="./login.php" method="POST">
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">                     
                    </div>  
                    <div>
                    <label for="exampleDataList" class="form-label">Occupation</label>
                        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                        <datalist id="datalistOptions">
                          <option name="user" value="Doctor" >
                          <option name="user" value="Receptionist">
                          
                        </datalist>
                    </div>

                    <!-- <input type="radio" name="user"  value="receptionist" id=""> Receptionist <br> <br>
                    <input type="radio" name="user" value="doctor" id=""> Doctor -->
                    <br>
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
