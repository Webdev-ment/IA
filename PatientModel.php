<?php

class PatientModel 
{
    private $conn;

    public function __construct()
    {    }
    
    //Function that connects to the database.
    public function Connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        echo "\nConnect called Successfully.";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($this->conn->connect_error) 
        {
            die("\nConnection failed: " . $this->conn->connect_error);
        }
        else 
        {
            echo "\nConnection successful.";
        }
    } 

    //

    public function CreatePatientTable()
    {
        //If the Patient table does not exist it will be created.
        $CreateTable = "CREATE TABLE IF NOT EXISTS Patient (
            pat_ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            pat_fname char(20) NOT NULL,
            pat_lname char(20) NOT NULL,
            pat_gender char(7) NOT NULL,
            pat_dob date NOT NULL,
            pat_age INT(3) NOT NULL,
            pat_address char(30) NOT NULL,
            pat_email char(30) NOT NULL,
            pat_phone char(10) NOT NULL)";

            if ($this->conn->query($CreateTable) === TRUE)
            {
                echo "\nTable created successfully or Table already exists.";
            }
            else {
                echo "\nError creating Table: " . $this->conn->error;
            }

    }

    // Function that adds Patient data to the database.
    public function InsertPatient(string $fname, string $lname, string $gender, string $dob, int $age, string $address, string $email, string $phone)
    {
        echo "\n Insert Patient successfully called.";

        //Checks to ensure the fields sent aren't empty.
        if(empty($fname) || empty($lname) || empty($gender) || empty($dob) || empty($age) || empty($address) || empty($email) || empty($phone))
        {
            $error["Required"] = "\nAll fields are Required!";
        }
        else
        {   
            // Values are inserted into the Patient table.
            $Insert = "INSERT INTO Patient (pat_fname, pat_lname, pat_gender, pat_dob, pat_age, pat_address, pat_email, pat_phone) VALUES ('$fname', '$lname', '$gender', '$dob', '$age', '$address', '$email', '$phone')";
                
            if ($this->conn->query($Insert) === TRUE)
            {
                echo "\n Patient created succesfully.";
            }  
            else{
                echo "\n Error inserting patient." . $this->conn->error;
                 
            }
        }
        
        $this->conn->close();
    }     

    // Function that displays the Patients inside the database.
    // This function currently does not pick up any data in the table.
    public function ViewPatient()
    {
        // Define select query
        $Select = "SELECT pat_fname, pat_lname, pat_gender, pat_dob, pat_age, pat_address, pat_email, pat_phone FROM Patient";

        // Call select query
        $this->conn->$Select;

        if($this->conn->$Select->num_rows > 0)
        {
            while($row = $this->conn->$Select->fetch_assoc())
            {
                echo "First Name: " . $row["pat_fname"]. " Last Name: ". $row["pat_lname"]. " Gender: ". $row["pat_gender"]. " Date of Birth: ". $row["pat_dob"]. " Address: ".  $row["pat_address"]. " Email: ". $row["pat_email"]. " Phone: ". $row["pat_phone"];
            } 
        }
        else {
            echo "No results.";
        }

        $this->conn->close();
    }

    // Function that displays all Patients insidee the database.
    public function get_all_Patients()
    {
        echo "\n Get all called successfully.";

        $all = "SELECT * FROM Patient";

        $this->conn->$all;
        
        $retval = mysqli_query( $all, $this->conn);

        if(! $retval)
        {
            echo "Could not get data: ". mysqli_error($this);
        }

        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
        {
            echo "First Name: " . $row["pat_fname"]. " Last Name: ". $row["pat_lname"]. " Gender: ". $row["pat_gender"]. " Date of Birth: ". $row["pat_dob"]. " Address: ".  $row["pat_address"]. " Email: ". $row["pat_email"]. " Phone: ". $row["pat_phone"];
        }
        
        echo "Fetched data successfully.";
    }
}
?>