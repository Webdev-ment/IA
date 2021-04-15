<?php
require_once("./Models/DoctorModel.php");

/**
 * Attempts to log in a doctor.
 * @param $email Email of the doctor.
 * @param $password Password of the doctor.
 * @return array Doctor's information if login was successful. Errors if it was not.
 */
function login_doctor(string $email, string $password): array {
    try {
        $connection = new DoctorModel();
        $results = $connection->authenticate(trim($email),trim($password));
        return $results;
    }
    catch(Throwable $err){}
    finally {
        $connection->close();
    }
}


function register_doctor(string $name,string $address,string $email,string $phone,string $password,string $confirm): array {
    try {
        $connection = new DoctorModel();
        $results = $connection->register(trim($name),trim($address),trim($email),trim($phone),trim($password),trim($confirm));
        return $results;
    }
    catch(Throwable $err){}
    finally {
        $connection->close();
    }
}


if($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET["allDoctors"])) {
        try {
            $connection = new DoctorModel();
            $doctors = $connection->get_all();
        }
        catch(Throwable $err) {}
        finally {
            $connection->close();
        }
    }
}



















?>