<?php

require_once("BaseModel.php");


/**
 * Performs operations on the Doctor Table.
 */
class DoctorModel extends BaseModel {
    public function __construct() {
        parent::__construct();
    }

    /**
     * Validates credentials sent for registration.
     * @param string $name The name of the user.
     * @param string $address The address of the user.
     * @param string $address The address of the user.
     * @param string $email The email of the user.
     * @param string $phone The phone number of the user.
     * @param string $password The password of the user.
     * @param string $confirm The password entered twice.
     */
    protected function validate_registration(string $name, string $address, string $email, string $phone, string $password, $confirm): array {
        $errors = $this->register_errors($name,$address,$email,$phone,$password,$confirm);

        if(!array_key_exists("Required",$errors)) {
            $results = $this->query("select * from doctor where dct_email = '{$email}'");
            if($results->num_rows > 0) $errors["Email"] = "The email is already taken";
        }
        
        if(array_key_exists("Required",$errors) || array_key_exists("Password",$errors) || array_key_exists("Email",$errors)) {
            return array("success" => false, "messages" => $errors);
        }
        else return array("success" => true);
    }

    /**
     * Registers a user in the system.
     * @param string $name The name of the user.
     * @param string $address The address of the user.
     * @param string $address The address of the user.
     * @param string $email The email of the user.
     * @param string $phone The phone number of the user.
     * @param string $password The password of the user.
     * @param string $confirm The password entered twice.
     */
    public function register(string $name, string $address, string $email, string $phone, string $password, string $confirm): array {
        $validation = $this->validate_registration($name,$address,$email,$phone,$password,$confirm);
        if($validation["success"]) {
            $password = password_hash($password,PASSWORD_BCRYPT);
            $this->query("insert into doctor (dct_name,dct_address,dct_email,dct_phone,dct_password) VALUES('{$name}','{$address}','{$email}','{$phone}','{$password}');");
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
            $results = $this->query("select dct_password from doctor where dct_email = '{$email}'");
            if($results->num_rows > 0) {
                $info = $results->fetch_assoc();
                if(password_verify($password,$info["dct_password"])) return array("success" => true);
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
        if($validation["success"]) return array("success" => true);
        return array("success" => false, "messages" => $validation["messages"]);
    }

    public function get_all(): array {
        return array();
    }
}







?>