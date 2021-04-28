<?php

require_once ("PatientModel.php");
require_once ("View.php");


if (!empty($_POST))
{
switch (true)
    {
    case isset($_POST['insert']): // Runs if the insert button is click.
        echo "\n Insert detected successfully";

        create_Patient($_POST["fname"], $_POST['lname'], $_POST["gender"], $_POST["dob"], $_POST["age"], $_POST["address"], $_POST["email"], $_POST["phone"]);
    break;

    case isset($_POST['view']): // Runs if the view button is click.
        echo "\n View detected successfully";

        view_Patient();
    break;

    case isset($_POST['edit']): // Runs if the edit button is click.
        echo "\n Edit detected successfully";


        edit_Patient($_GET["edit_ID"], $_GET["edit_fname"], $_GET['edit_lname'], $_GET["edit_gender"], $_GET["edit_dob"], $_GET["edit_age"], $_GET["edit_address"], $_GET["edit_email"], $_GET["edit_phone"]);
        
        echo "\n Edit Patient called successfully.";
    break;

    case isset($_POST['delete']): // Runs if the delete button is click.
        echo "\n Delete called successfully";
                
        delete_Patient($_POST["delete_ID"]);
    break;
    }
}



// if(isset($_POST['insert'])) //If the insert button is click the function will be called.
// {
//     echo "\n Insert detected successfully";

//     create_Patient($_POST["fname"], $_POST['lname'], $_POST["gender"], $_POST["dob"], $_POST["age"], $_POST["address"], $_POST["email"], $_POST["phone"]);
// }
// else
// {
//     if(isset($_POST['view']))
//     {
//         echo "\n View detected successfully";

//         view_Patient();
//     }
//     else{
//         if(isset($_POST['edit']))
//         {
//             echo "\n Edit detected successfully";


//             edit_Patient($_POST["pat_ID"], $_POST["pat_fname"], $_POST['pat_lname'], $_POST["pat_gender"], $_POST["pat_dob"], $_POST["pat_age"], $_POST["pat_address"], $_POST["pat_email"], $_POST["pat_phone"]);
//         }
//         else{
//             if(isset($_POST['delete']))
//             {
//                 echo "\n Delete called successfully";
                
//                 delete_Patient($_GET["id"]);
//             }
//         }
//     }
// }




// Function that calls the Create Paitient Table and Insert Patient Functions from the Patient Model.
function create_Patient(string $fname, string  $lname, string $gender, string $dob, int $age, string $address, string $email, string $phone)
{

    echo "\n Create Patient called successfully";

    $Object = new PatientModel();

    $Object->Connect();
    $Object->CreatePatientTable();
    $Object->InsertPatient($fname, $lname, $gender, $dob, $age, $address, $email, $phone);

    header("location: AddPatientInfo.php");

}

// Function that calls the get all patients function from the Patient Model.
function view_Patient()
{
    echo "\n View Patient called succefully";
    // $Object = new PatientModel();

    // $Object->ViewPatientsPage();

    header("location: viewPatientInfo.php");

}

function edit_Patient(int $ID, string $fname, string $lname, string $gender, string $dob, int $age, string $address, string $email, string $phone)
{
    echo "\n edit Patient called succefully";

    $Object = new PatientModel();

    $Object->Connect();
    $Object->Update_Patient($ID, $fname, $lname, $gender, $dob, $age, $address, $email, $phone);

    view_Patient();
}


function delete_Patient(int $ID)
{
    echo "\n Delete Patient called succefully";

    $Object = new PatientModel();

    $Object->Connect();
    $Object->Delete_Patient($ID);

    view_Patient();
}
?>