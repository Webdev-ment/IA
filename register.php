<?php  

session_start();
require_once("./Controllers/DoctorController.php");
require_once("./Controllers/ReceptionistController.php");
if(!empty($_SESSION["register_errors"])) unset($_SESSION["register_errors"]);

$register_information = array();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    //$register_information = array();

    if(empty($_POST["datalistOptions"])) {
        $_SESSION["register_errors"]["Occupation"] = "Please select an occupation.";
        header("Location: registration.php");
    }
    else if(!($_POST["datalistOptions"] == "Doctor") && !($_POST["datalistOptions"] == "Receptionist") ) {
        $_SESSION["register_errors"]["Occupation"] = "Please select an occupation.";
        header("Location: registration.php");
    }
    else {
        if($_POST["datalistOptions"] == "Receptionist") {
            $register_information = register_receptionist($_POST["fname"],$_POST["lname"],$_POST["address"],$_POST["email"],$_POST["phone"],$_POST["password"],$_POST["confirm"]);
        }
        else $register_information = register_doctor($_POST["fname"],$_POST["lname"],$_POST["address"],$_POST["email"],$_POST["phone"],$_POST["password"],$_POST["confirm"]); 
    
        if($register_information["success"]) {
            //Registration was successful. Redirect them to the login page.
            header("Location: index.php");
        }
        else {
            //redirect to login with information about errors from $register_information["messages"]
            $_SESSION["register_errors"] = $register_information["messages"];
            header("Location: registration.php");
            //print_r($register_information["messages"]);
        }
    }
}

?>