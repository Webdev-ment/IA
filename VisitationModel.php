<?php

class Visitation
{
    //ATTRIBUTES
    private $conn;

    //METHODS 

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

    // Function to create the visitation table.
    public function CreateVisitationTable()
    {
        //If the Patient table does not exist it will be created.
        $CreateTable = "CREATE TABLE IF NOT EXISTS Visitation (
           vst_ID INT(10) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
           pat_ID INT(10) NOT NULL FOREIGN KEY,
           dct_ID INT(10) NOT NULL FOREIGN KEY,
           vst_Drugs CHAR(50) NOT NULL,
           vst_Date DATE NOT NULL,
           vst_Comment CHAR(150) NOT NULL,
           FOREIGN KEY (pat_ID) REFERENCES Patient(pat_id),
           FOREIGN KEY (dct_ID) REFERENCES Doctor(dct_id)
           )";

            if ($this->conn->query($CreateTable) === TRUE)
            {
                echo "\n Table created successfully or Table already exists.";
            }
            else {
                echo "\n Error creating Table: " . $this->conn->error;
            }

    }

    // Function to add visitations.
    public function AddVisitation(INT $pat_ID, INT $dct_ID, string $vst_Drug, string $vst_Date, string $vst_Comment)
    {
        // Checks for empty fields.
        if( empty($pat_ID) || empty($dct_ID) || empty($vst_Drug) || empty($vst_Date) || empty($vst_Comment))
        {
            $error['Required'] = "\n All Fields Required.";
        }
        else {

            $Insert = "INSERT INTO Visitation (pat_ID, dct_ID, vst_Drug, vst_Date, vst_Comment) VALUES ('$pat_ID', '$dct_ID', '$vst_Drug', '$vst_Date', '$vst_Comment)";

            if ($this->conn->query($Insert) === TRUE)
            {
                echo "\n Visitation added succesfully.";
            }  
            else{
                echo "\n Error adding visitation." . $this->conn->error;
            }
                 
        }

        $this->conn->close();
    }


     // Function that displays all Visitations inside the database.
     public function get_all_Visitations()
     {
        $servername = "localhost";
        $username = "root";
        $password = "";
        //$dbname = "project";
        $dbname = "ia_proj";

        echo "\n Get all called successfully.";

         // Create connection
         $this->conn = new mysqli($servername, $username, $password, $dbname);
         // Check connection
         if ($this->conn->connect_error) {
             die("Connection failed: " . $this->conn->connect_error);
             }

 
         $view = "SELECT * FROM Visitation";
         $result = $this->conn->query($view);

          
         if ($result->num_rows > 0) {

            echo '<table style="width: 90%; margin-left: 5%; margin-right: 5%; border-style: solid; cellpadding=1; border-width: 1px; text-align: center; ">';
            echo '<tr>'; 
            echo '<td style="border-bottom:  1px solid #ddd;"> <h4>Visitation ID</h4> </td>';
            echo '<td style="border-bottom:  1px solid #ddd;"> <h4>Patient ID</h4> </td>';
            echo '<td style="border-bottom:  1px solid #ddd;"> <h4>Doctor ID</h4> </td>';
            echo '<td style="border-bottom:  1px solid #ddd;"> <h4>Visitation Drug</h4> </td>';
            echo '<td style="border-bottom:  1px solid #ddd;"> <h4>Visitation Date</h4> </td>';
            echo '<td style="border-bottom:  1px solid #ddd;"> <h4>Visitation Comment</h4> </td>';
            echo '<tr>'; 
            while($row = $result->fetch_assoc()) {
                echo '<tr>'; 
                echo '<td style="border-bottom:  1px solid #ddd">' . $row['vst_ID'] . '</td>';
                echo '<td style="border-bottom:  1px solid #ddd">' . $row['pat_ID'] . '</td>';
                echo '<td style="border-bottom:  1px solid #ddd">' . $row['dct_ID'] . '</td>';
                echo '<td style="border-bottom:  1px solid #ddd">' . $row['vst_Drug'] . '</td>';
                echo '<td style="border-bottom:  1px solid #ddd">' . $row['vst_Date'] . '</td>';
                echo '<td style="border-bottom:  1px solid #ddd">' . $row['vst_Comment'] . '</td></br>';
                echo "</tr>";
            }
            echo "</table>";
        } else {
        echo "</br> 0 results";
        }
        $this->conn->close();
     }

     public function DeleteVisitation(int $ID)
     {
        $this->Connect();

        $Deleted_ID = $ID;

        if(empty($Deleted_ID))
        {
            exit("\n Error, no Visitation ID Found!");
        }

        echo "\n The index called was:" . $Deleted_ID;


        // Defines query to delete record.
        $Delete = "DELETE FROM Visitation WHERE vt_ID = '$Deleted_ID'";

        // Calls query to delete record.
        if($this->conn->query($Delete) === TRUE)
        {
            echo "\n Visitation deleted successfully!";
        }
        else {
            echo "\n Error deleting record: ". $this->conn->error;
        }
     }

     public function UpdateVisitation(INT $vst_ID, INT $pat_ID, INT $dct_ID, string $vst_Drug, string $vst_Date, string $vst_Comment)
     {
        $this->Connect();

        if( empty($vst_ID) || empty($pat_ID) || empty($dct_ID) || empty($vst_Drug) || empty($vst_Date) || empty($vst_Comment))
        {
            $error['Required'] = "\n All Fields Required.";
        }    
        else
        {
            $Update = "UPDATE Visitation SET pat_ID='$pat_ID', dct_ID='$dct_ID', vst_Drug='$vst_Drug', vst_Date='$vst_Date', vst_Comment='$vst_Comment' WHERE vst_ID= '$vst_ID' " ;

            // Calls update query.
            if($this->conn->query($Update) === TRUE)
            {
                echo "\n Visitation updated successfully!";
            }
            else {
                echo "\n Error updating record: ". $this->conn->error;
            }
        }

     }

}
?>