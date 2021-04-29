<?php
session_start();

//Logs out a user and clears their session information. Redirects them to index.php
if($_SERVER["REQUEST_METHOD"] == "GET") {
    session_unset();
    session_destroy();
    header("Location: index.php");
}
?>