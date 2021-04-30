<?php
session_start();

require_once("./Controllers/DoctorController.php");
require_once("./Controllers/ReceptionistController.php");
if(!empty($_SESSION["login_errors"])) unset($_SESSION["login_errors"]);

$session_information = array();


if($_SERVER["REQUEST_METHOD"] == "POST") {
    //$session_information = array();
    
    if(empty($_POST["datalistOptions"])) {
        $_SESSION["login_errors"]["Occupation"] = "Please select an occupation.";
        header("Location: index.php");
    }
    else if(!($_POST["datalistOptions"] == "Doctor") && !($_POST["datalistOptions"] == "Receptionist") ) {
        $_SESSION["login_errors"]["Occupation"] = "Please select an occupation.";
        header("Location: index.php");
    }
    else {
        if($_POST["datalistOptions"] == "Receptionist") $session_information = login_receptionist($_POST["email"],$_POST["password"]);
        else $session_information = login_doctor($_POST["email"],$_POST["password"]);
      

        if($session_information["success"]) {
            //Create session with information here using $session_information["current_user_info"] and redirect user to home.php
            $_SESSION["USER"] = $session_information["current_user_info"]; 
            //header("Location: home.php");
            header("Location: home.php");
        }
        else {
            //redirect to page with the errors presented using $session_information["messages"]
            $_SESSION["login_errors"] = $session_information["messages"];
            header("Location: index.php");
        }
    }
}

?>