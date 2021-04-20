<?php

require_once("VisitationModel.php");

// Function that calls the create visitation table and add visitation functions from the visitation model.
function CreateVisitation()
{

    $Object = new Visitation();
    
    $Object->Connect();
    $Object->CreateVisitationTable();
    $Object->AddVisitation();
}

// Function that calls the get all visitation function from the visitation model.
function ViewVisitation()
{
    $Object = new Visitation();
    $Object->Connect();
    $Object->get_all_Visitations();
}

?>