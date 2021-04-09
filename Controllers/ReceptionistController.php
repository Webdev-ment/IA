<?php

require_once("../Models/ReceptionistModel.php");


if($_SERVER["REQUEST_METHOD"] == "POST")
{

    // $name = trim($_POST["name"]);
    // $address = trim($_POST["address"]);
    $email = trim($_POST["email"]);
    // $phone = trim($_POST["phone"]);
    $password = trim($_POST["password"]);
    // $confirm = trim($_POST["confirm"]);
    $connection = new ReceptionistModel();
    // $results = $connection->register($name,$address,$email,$phone,$password,$confirm);

    // if($results["success"]) echo "<h1>You are now registered</h1>";
    // else print_r($results["messages"]);

    $results = $connection->authenticate($email,$password);
    if($results["success"]) echo "<h1>You have successfully logged in</h1>";
    else print_r($results["messages"]);
}

















?>