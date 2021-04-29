<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
    //User tries to access page without logging in. Send them back to index.php
    if(!isset($_SESSION["USER"])) header("Location: index.php");
    else {
        
        echo "<h1>This person is currently logged in...</h1>";
        echo "<h1>".$_SESSION["USER"]["type"]." ".$_SESSION["USER"]["fname"]." ".$_SESSION["USER"]["lname"]."</h1>";
        echo "<h1>Address: ".$_SESSION["USER"]["address"]."</h1>";
        echo "<h1>Phone: ".$_SESSION["USER"]["phone"]."</h1>";
        echo "<h1>Email: ".$_SESSION["USER"]["email"]."</h1>";
    }
}
?>

