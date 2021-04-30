<?php

require_once("BaseModel.php");
/**
 * Performs operations on the Receptionist Table
 */
class ReceptionistModel extends BaseModel {
    
    public function __construct() {
        parent::__construct();
    }
    
   /**
     * Validates credentials sent for registration.
     * @param string $fname The first name of the user.
     * @param string $lname The last name of the user.
     * @param string $address The address of the user.
     * @param string $address The address of the user.
     * @param string $email The email of the user.
     * @param string $phone The phone number of the user.
     * @param string $password The password of the user.
     * @param string $confirm The password entered twice.
     */
    protected function validate_registration(string $fname, string $lname, string $address, string $email, string $phone, string $password, $confirm): array {
        $errors = $this->register_errors($fname,$lname,$address,$email,$phone,$password,$confirm);

        if(!array_key_exists("Required",$errors)) {
            $stmt = $this->prepare("select * from doctor where dct_email = ?");
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $results1 = $stmt->get_result();
            $stmt = $this->prepare("select * from receptionist where rcp_email = ?");
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $results2 = $stmt->get_result();

            if($results1->num_rows > 0 || $results2->num_rows > 0) $errors["Email"] = "The email is already taken";
        }
        
        if(array_key_exists("Required",$errors) || array_key_exists("Password",$errors) || array_key_exists("Email",$errors) || array_key_exists("Strength",$errors)) {
            return array("success" => false, "messages" => $errors);
        }
        else return array("success" => true);
    }

    /**
     * Registers a receptionist in the system.
     * @param string $fname The first name of the user.
     * @param string $lname The last name of the user.
     * @param string $address The address of the user.
     * @param string $email The email of the user.
     * @param string $phone The phone number of the user.
     * @param string $password The password of the user.
     * @param string $confirm The password entered twice.
     */
    public function register(string $fname, string $lname, string $address, string $email, string $phone, string $password, string $confirm): array {
        $validation = $this->validate_registration($fname,$lname,$address,$email,$phone,$password,$confirm);
        if($validation["success"]) {
            $password = password_hash($password,PASSWORD_BCRYPT);
            $stmt = $this->prepare("insert into receptionist (rcp_fname,rcp_lname,rcp_address,rcp_email,rcp_phone,rcp_password) VALUES(?,?,?,?,?,?);");
            $stmt->bind_param("ssssss",$fname,$lname,$address,$email,$phone,$password);
            $stmt->execute();

            if($this->affected_rows > 0) return array("success" => true);
        }
        return array("success" => false, "messages" => $validation["messages"]);
    }

    
    /**
     * Checks for errors in the login credentials submitted.
     * @param string $email The email of the user.
     * @param string $password The password of the user.
     * @return array Validation errors.
     */
    protected function validate_login(string $email, string $password): array {
        $errors = array();
        if(empty($email) || empty($password)) $errors["Required"] = "All fields are required.";
        else {
            $stmt = $this->prepare("select * from receptionist where rcp_email = ?");
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $results = $stmt->get_result();
            if($results->num_rows > 0) {
                $info = $results->fetch_assoc();
                if(password_verify($password,$info["rcp_password"])) {
                    //Create an associative array that will send back all the current user's information
                    $session_details = array();
                    $session_details["id"] = $info["rcp_id"];
                    $session_details["fname"] = $info["rcp_fname"];
                    $session_details["lname"] = $info["rcp_lname"];
                    $session_details["address"] = $info["rcp_address"];
                    $session_details["phone"] = $info["rcp_phone"];
                    $session_details["email"] = $info["rcp_email"];
                    $session_details["type"] = "receptionist";
                    return array("success" => true,"current_user_info" => $session_details);
                }
            }
            $errors["Credentials"] = "Invalid Credentials";
        }

        if(array_key_exists("Required",$errors) || array_key_exists("Credentials",$errors)) return array("success" => false, "messages" => $errors);
    }

    /**
     * Authenticates a user of the system.
     * @param string $email The email of the user.
     * @return array Authentication information.
     */
    public function authenticate(string $email, string $password): array {
        $validation = $this->validate_login($email,$password);
        return $validation;
    }

    /**
     * Gets a specific receptionist's information.
     * @param $id The id of the receptionist.
     * @return array An array of the receptionist's information.
     */
    public function get_current_user($id): array {
        $stmt = $this->prepare("select * from receptionist where rcp_id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $results = $stmt->get_result();
        $info = $results->fetch_assoc();
        return $info;
    }


    public function create_table() {
        $stmt = $this->prepare("create table if not exists receptionist (
            rcp_id int(6) unsigned auto_increment primary key,
            rcp_fname varchar(30) COLLATE utf8_unicode_ci not null,
            rcp_lname varchar(30) COLLATE utf8_unicode_ci not null,
            rcp_address varchar(30) COLLATE utf8_unicode_ci not null,
            rcp_email varchar(30) COLLATE utf8_unicode_ci not null,
            rcp_phone varchar(30) COLLATE utf8_unicode_ci not null,
            rcp_password varchar(100) COLLATE utf8_unicode_ci not null)");

        $stmt->execute();
    }

    /**
     * Gets all the receptionists and their information.
     * @return array All receptionists.
     */
    public function get_all(): array {
        $results = $this->query("select * from receptionist");
        return $results->fetch_assoc();
    }
}
?>