<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
    //User tries to access page without logging in. Send them back to index.php
    if(!isset($_SESSION["USER"])) header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./logout.php" method="post">
        <input type="submit" value="Log Out">
    </form>
    <form action="./profile.php" method="get">
        <input type="submit" value="Profile">
    </form>
</body>
</html>