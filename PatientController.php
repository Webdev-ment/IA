<?php

// require_once("PatientModel.php");

// $name = $_Post['Name'];
// $DoB = $_Post['DoB'];
// $age = $_Post['Age'];
// $address = $_Post['Address'];
// $email = $_Post['Email'];
// $phone = $_Post['Phone'];

// if(isset($_POST))
// {
//     create_Patient($name, $DoB, $age, $address, $email, $phone);
// }

function create_Patient(string $name, string $dob, int $age, string $address, string $email, string $phone)
{
    //if(isset($_POST))
    try{
        $connection = new PatientModel();
        $results = $connection->AddPatient(trim($name), trim($dob), trim($age), trim($address), trim($email), trim($phone));
        return $results;
    }
    catch(Throwable $err){}
    finally {
        $connection->close();
    }
}
?>