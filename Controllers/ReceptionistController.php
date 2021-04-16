<?php
require_once("./Models/ReceptionistModel.php");


/**
 * Attempts to log in a receptionist.
 * @param $email Email of the receptionist.
 * @param $password Password of the receptionist.
 * @return array Receptionist's information if login was successful. Errors if it was not.
 */
function login_receptionist(string $email, string $password): array {
    try {
        $connection = new ReceptionistModel();
        $results = $connection->authenticate(trim($email),trim($password));
        return $results;
    }
    catch(Throwable $err){}
    finally {
        $connection->close();
    }

}

function register_receptionist(string $fname,string $lname,string $address,string $email,string $phone,string $password,string $confirm): array {
    try {
        $connection = new ReceptionistModel();
        $results = $connection->register(trim($fname),trim($lname),trim($address),trim($email),trim($phone),trim($password),trim($confirm));
        return $results;
    }
    catch(Throwable $err){
        echo "An error occurred.";
    }
    finally {
        $connection->close();
    }
}


if($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET["allReceptionists"])) {
        try {
            $connection = new ReceptionistModel();
            $receptionists = $connection->get_all();
        }
        catch(Throwable $err) {}
        finally {
            $connection->close();
        }
    }
}
?>