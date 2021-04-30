<?php

require_once("VisitationModel.php");


if (!empty($_POST))
{
switch (true)
    {
    case isset($_POST['insert']): // Runs if the insert button is click.
        echo "\n Insert detected successfully";

        CreateVisitation($_POST['pat_ID'], $_POST['dct_ID'], $_POST['vst_Drug'], $_POST['vst_Date'], $_POST['vst_Comment']);

    break;

    case isset($_POST['view']): // Runs if the view button is click.
        echo "\n View detected successfully";

        ViewVisitation();
    break;

    case isset($_POST['edit']): // Runs if the edit button is click.
        echo "\n Edit detected successfully";

        UpdateVisitation($_POST['vst_ID'], $_POST['pat_ID'], $_POST['dct_ID'], $_POST['vst_Drug'], $_POST['vst_Date'], $_POST['vst_Comment']);
    break;

    case isset($_POST['delete']): // Runs if the delete button is click.
        echo "\n Delete called successfully";
                
        DeleteVisitation($_POST["deleted_ID"]);
    break;
    }
}


// Function that calls the create visitation table and add visitation functions from the visitation model.
function CreateVisitation(INT $pat_ID, INT $dct_ID, string $vst_Drug, string $vst_Date, string $vst_Comment)
{

    $Object = new Visitation();
    
    $Object->Connect();
    $Object->CreateVisitationTable();
    $Object->AddVisitation($pat_ID, $dct_ID, $vst_Drug, $vst_Date, $vst_Comment);
}

// Function that calls the get all visitation function from the visitation model.
function ViewVisitation()
{
    $Object = new Visitation();
    $Object->Connect();
    $Object->get_all_Visitations();
}

function DeleteVisitation(INT $ID)
{
    $Object = new Visitation();

    $Object->Connect();
    $Object->DeleteVisitation($ID);

    ViewVisitation();

}

function UpdateVisitation(INT $vst_ID, INT $pat_ID, INT $dct_ID, string $vst_Drug, string $vst_Date, string $vst_Comment)
{
    $Object = new Visitation();
    $Object->Connect();
    $Object->UpdateVisitation($vst_ID, $pat_ID, $dct_ID, $vst_Drug, $vst_Date, $vst_Comment);


    ViewVisitation();
}

?>