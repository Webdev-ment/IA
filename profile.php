<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
    //User tries to access page without logging in. Send them back to index.php
    if(!isset($_SESSION["USER"])) header("Location: index.php");
    else {
        print_r($_SESSION["USER"]);
    }
}
?>