<?php

require_once ("View.php");

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
        //$dbname = "project";
        $dbname = "ia_proj";

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
        $this->Connect();

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
                echo "\n Patient inserted succesfully.";
            }  
            else{
                echo "\n Error inserting patient." . $this->conn->error;
                 
            }
        }
        
        $this->conn->close();
    }     

    // This Function updates values in the table
    public function Update_Patient(int $ID, string $fname, string $lname, string $gender, string $dob, int $age, string $address, string $email, string $phone)
    {
        $this->Connect();

        echo "Update Patient Called Successfully";

        //Checks to ensure the fields sent aren't empty.
        if(empty($ID) || empty($fname) || empty($lname) || empty($gender) || empty($dob) || empty($age) || empty($address) || empty($email) || empty($phone))
        {
            $error["Required"] = "\n All fields are Required!";
        }
        else
        {
            $Update = "UPDATE Product SET pat_fname='$fname', pat_lname='$lname', pat_gender='$gender', pat_dob='$dob', pat_age='$age', pat_address='$address', pat_email='$email', pat_phone='$phone' WHERE pat_id= '$ID' " ;

            // Calls update query.
            if($this->conn->query($Update) === TRUE)
            {
                echo "\n Product Updated successfully!";
            }
            else {
                echo "\n Error updating record: ". $this->conn->error;
            }
        }

    }

    // This Function deletes the record from the table
    public function Delete_Patient(int $ID)
    {
        $this->Connect();

        $Deleted_ID = $ID;
       
        if(empty($Deleted_ID))
        {
            exit("\n Error, no Patient ID Found!");
        }

        echo "\n The index called was:" . $Deleted_ID;


        // Defines query to delete record.
        $Delete = "DELETE FROM Patient WHERE pat_ID = '$Deleted_ID'";

        // Calls query to delete record.
        if($this->conn->query($Delete) === TRUE)
        {
            echo "\n Patient deleted successfully!";
        }
        else {
            echo "\n Error deleting record: ". $this->conn->error;
        }

    }
    

    // Function that displays all Patients inside the database.
    public function get_all_Patients()
    {
        //View.php requires PatientModel, the constructor runs giving the frame of the page and then it calls this function from PatientModel?
    
        $this->Connect();
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "project";
        // $dbname = "ia_proj";

        echo "\n Get all called successfully.";

        // Create connection
        // $this->conn = new mysqli($servername, $username, $password, $dbname);
       
        // Check connection
        // if ($this->conn->connect_error) {
        //     die("Connection failed: " . $this->conn->connect_error);
        //     }

        $all = "SELECT * FROM Patient";
        $result = $this->conn->query($all);     
        

        // Echoes out a form to display database information in a new page and who's POST data (button presses) will be sent to PatientController.php 
        if ($result->num_rows > 0)
        {
            echo '<form action="PatientController.php" method="POST" target="__blank">';
            echo '<table style="width: 90%; margin-left: 5%; margin-right: 5%; border-style: solid; cellpadding=1; border-width: 1px; text-align: center; ">';
            echo '<tr>'; 
            echo '<td style="border-bottom:  1px solid #ddd;"> <h4>Patient ID</h4> </td>';
            echo '<td style="border-bottom:  1px solid #ddd;"> <h4>First Name</h4> </td>';
            echo '<td style="border-bottom:  1px solid #ddd;"> <h4>Last Name</h4> </td>';
            echo '<td style="border-bottom:  1px solid #ddd;"> <h4>Gender</h4> </td>';
            echo '<td style="border-bottom:  1px solid #ddd;"> <h4>Date of Birth</h4> </td>';
            echo '<td style="border-bottom:  1px solid #ddd;"> <h4>Address</h4> </td>';
            echo '<td style="border-bottom:  1px solid #ddd;"> <h4>Email</h4> </td>';
            echo '<td style="border-bottom:  1px solid #ddd;"> <h4>Phone</h4> </td>';
            // echo '<td style="border-bottom:  1px solid #ddd;"> <h4>Action</h4> </td>';
            echo '</tr>'; 

            $Patients = array();
            
            //if(count($_POST['pat_ID']) > 0)
            //foreach($_POST['pat_ID'] as $row)
            //while($row = $result->fetch_assoc()) 
            while($Patient = $result->fetch_assoc())
            {
                $Patients[] = $Patient;
            }
            foreach ($Patients as $Patient)
            {
                echo '<tr>'; 

                
                // echo '<td style="border-bottom:  1px solid #ddd">' . '<input type="text" name="f_ID" value="' . $Patient["pat_ID"] . '"readonly>' . '</td>';
                // echo '<td style="border-bottom:  1px solid #ddd">' . '<input type="text" name="f_fname" value="' . $Patient["pat_fname"] . '">' . '</td>';
                // echo '<td style="border-bottom:  1px solid #ddd">' . '<input type="text" name="f_lname" value="' . $Patient["pat_lname"] . '">' . '</td>';
                // echo '<td style="border-bottom:  1px solid #ddd">' . '<input type="text" name="f_gender" value="' . $Patient["pat_gender"] . '">' . '</td>';
                // echo '<td style="border-bottom:  1px solid #ddd">' . '<input type="text" name="f_dob" value="' . $Patient["pat_dob"] . '">' . '</td>';
                // echo '<td style="border-bottom:  1px solid #ddd">' . '<input type="text" name="f_address" value="' . $Patient["pat_address"] . '">' . '</td>';
                // echo '<td style="border-bottom:  1px solid #ddd">' . '<input type="text" name="f_email" value="' . $Patient["pat_email"] . '">' . '</td>';
                // echo '<td style="border-bottom:  1px solid #ddd">' . '<input type="text" name="f_phone" value="' . $Patient["pat_phone"] . '">' . '</td>';

                echo '<td style="border-bottom:  1px solid #ddd">' . $Patient["pat_ID"] . '</td>';
                echo '<td style="border-bottom:  1px solid #ddd">' . $Patient["pat_fname"] . '</td>';
                echo '<td style="border-bottom:  1px solid #ddd">' . $Patient["pat_lname"] . '</td>';
                echo '<td style="border-bottom:  1px solid #ddd">' . $Patient["pat_gender"] . '</td>';
                echo '<td style="border-bottom:  1px solid #ddd">' . $Patient["pat_dob"] . '</td>';
                echo '<td style="border-bottom:  1px solid #ddd">' . $Patient["pat_address"] . '</td>';
                echo '<td style="border-bottom:  1px solid #ddd">' . $Patient["pat_email"] . '</td>';
                echo '<td style="border-bottom:  1px solid #ddd">' . $Patient["pat_phone"] . '</td>';


            // echo '<td style="border-bottom:  1px solid #ddd">' . '<input type="submit" name="delete" value="Delete"> ' . '</td>';
            }
        
        echo "Fetched data successfully.";
        } 

    }

    

}
   

?>