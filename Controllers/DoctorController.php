<?php

require_once("./Models/DoctorModel.php");

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



















?>