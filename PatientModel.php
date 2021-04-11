<?php

require_once("BaseModel.php");

Class PatientModel extends BaseModel
    {
      // public function __construct() 
      // {
      //   parent::__construct();
      // }

      public function AddPatient(string $name, string $DoB, int $age, string $address, string $email, strong $phone)
      {
        if(empty($name) || empty($DoB) || empty($age) || empty($address) || empty($email) || empty($phone))
        {
            $error["Required"] = "All fields are Required!";
        }
        else
        {
            $this-query("CREATE TABLE IF NOT EXIST 'Patient'(
            pat_ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            pat_name char(20) NOT NULL,
            pat_dob date NOT NULL,
            pat_age INT(3) NOT NULL,
            pat_address char(30) NOT NULL,
            pat_email char(30) NOT NULL,
            pat_phone INT(10) NOT NULL);");

            $this->query("INSERT into Patient (pat_Name, pat_DoB, pat_Age, pat_Address, pat_Email, pat_phone) VALUES ({'$name'}, {'$DoB'}, {'$age'}, {'$address'}, {'$email'}, {'$phone'});");
        }
        if($this->affected_rows > 0) return array("success" => true);
      }
  
    }
?>