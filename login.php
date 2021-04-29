<?php
session_start();

require_once("./Controllers/DoctorController.php");
require_once("./Controllers/ReceptionistController.php");

//Pushed Code

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $session_information = array();
    
    if(empty($_POST["datalistOptions"])) {
        echo "<h1>Required to choose an occupation.</h1>";
    }
    if(!($_POST["datalistOptions"] == "Doctor") && !($_POST["datalistOptions"] == "Receptionist") ) echo "<h1>Required to choose an occupation.</h1>";
    else {
        if($_POST["datalistOptions"] == "Receptionist") $session_information = login_receptionist($_POST["email"],$_POST["password"]);
        else $session_information = login_doctor($_POST["email"],$_POST["password"]);
      

        if($session_information["success"]) {
            //Create session with information here using $session_information["current_user_info"] and redirect user to home.php
            $_SESSION["USER"] = $session_information["current_user_info"]; 
            //header("Location: home.php");
            header("Location: viewPatientInfo.php");
        }
        else {
            //redirect to page with the errors presented using $session_information["messages"]
            //header("Location: index.php");
            print_r($session_information["messages"]);
        }
    }
}

?>