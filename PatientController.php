<?php

require_once ("PatientModel.php");

if(isset($_POST['insert'])) //If the insert button is click the function will be called.
{
    echo "\n Insert detected successfully";

    create_Patient($_POST["fname"], $_POST['lname'], $_POST["gender"], $_POST["dob"], $_POST["age"], $_POST["address"], $_POST["email"], $_POST["phone"]);
}
else
{
    if(isset($_POST['view']))
    {
        echo "\n View detected successfully";

        view_Patient();
    }
}


function create_Patient(string $fname, string  $lname, string $gender, string $dob, int $age, string $address, string $email, string $phone)
{

    echo "\n Create Patient called successfully";

    $Object = new PatientModel();

    $Object->Connect();
    $Object->CreatePatientTable();
    $Object->InsertPatient($fname, $lname, $gender, $dob, $age, $address, $email, $phone);
}

function view_Patient()
{
    echo "\n View Patient called succefully";

    $Object = new PatientModel();

    $Object->Connect();
    $Object->get_all_Patients();

}


?>