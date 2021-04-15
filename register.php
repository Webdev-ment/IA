<?php  

require_once("./Controllers/DoctorController.php");
require_once("./Controllers/ReceptionistController.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $register_information = array();

    if(!array_key_exists("user",$_POST)) {
        echo "<h1>Please select a button.</h1>";
    }
    else {
        if($_POST["user"] == "receptionist") {
            $register_information = register_receptionist($_POST["name"],$_POST["address"],$_POST["email"],$_POST["phone"],$_POST["password"],$_POST["confirm"]);
        }
        else $register_information = register_doctor($_POST["name"],$_POST["address"],$_POST["email"],$_POST["phone"],$_POST["password"],$_POST["confirm"]); 
    
        if($register_information["success"]) {
            //Registration was successful. Redirect them to the login page.
            header("Location: index.php");
        }
        else {
            //redirect to login with information about errors from $register_information["messages"]
            print_r($register_information["messages"]);
        }
    }
}

?>