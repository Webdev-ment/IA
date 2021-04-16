<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form action="./register.php" method="POST">
        <input type="text" name="fname" placeholder="First Name">
        <input type="text" name="lname" placeholder="Last Name">
        <input type="text" name="address" placeholder="Address">
        <input type="email" name="email" id="" placeholder="Email Address">
        <input type="text" name="phone" placeholder="Phone Number">
        <input type="password" name="password" id="" placeholder="Password">
        <input type="password" name="confirm" id="" placeholder="Confirm Password">
        <input type="radio" name="user"  value="receptionist" id=""> Receptionist <br>
        <input type="radio" name="user" value="doctor" id=""> Doctor
        <input type="submit" value="Sign Up">    
    </form>
</body>
</html>