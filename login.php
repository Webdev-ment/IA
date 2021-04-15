<?php
session_start();

require_once("./Controllers/DoctorController.php");
require_once("./Controllers/ReceptionistController.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $session_information = array();
    
    if(!array_key_exists("user",$_POST)) {
        echo "<h1>Please select a button</h1>";
    }
    else {
        if($_POST["user"] == "receptionist") $session_information = login_receptionist($_POST["email"],$_POST["password"]);
        else $session_information = login_doctor($_POST["email"],$_POST["password"]);

        if($session_information["success"]) {
            //Create session with information here using $session_information["current_user_info"] and redirect user to home.php
            $_SESSION["USER"] = $session_information["current_user_info"]; 
            header("Location: home.php");
        }
        else {
            //redirect to page with the errors presented using $session_information["messages"]
            //header("Location: index.php");
            print_r($session_information["messages"]);
        }
    }
}

?>