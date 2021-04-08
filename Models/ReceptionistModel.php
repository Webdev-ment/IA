<?php


namespace Models;

class ReceptionistModel extends BaseModel {
    
    public function __construct() {
        parent::__construct();
    }

    protected function validate_registration(string $name, string $address, string $email, string $phone, string $password, $confirm): array {
        $errors = $this->register_errors($name,$address,$email,$phone,$password,$confirm);

        if(!array_key_exists("Required",$errors)) {
            $results = $this->query("select * from receptionist where rcp_email = '{$email}'");
            if($results->num_rows > 0) $errors["Email"] = "The email is already taken";
        }
        
        if(array_key_exists("Required",$errors) || array_key_exists("PasswordError",$errors) || array_key_exists("Email",$errors)) {
            return array("success" => false, "messages" => $errors);
        }
        else return array("success" => true);
    }

    public function register(string $name, string $address, string $email, string $phone, string $password, string $confirm): array {
        $validation = $this->validate_registration($name,$address,$email,$phone,$password,$confirm);
        if($validation["success"]) {
            $password = password_hash($password,"PASSWORD_BCRYPT");
            $this->query("insert into receptionist (rcp_name,rcp_address,rcp_email,rcp_phone,rcp_password) VALUES('{$name}','{$address}','{$email}','{$phone}','{$password}');");
            if($this->affected_rows > 0) return array("success" => true);
        }
        return array("success" => false, "messages" => $validation["messages"]);
    }


    protected function validate_login(string $email, string $password): array {
        $errors = array();
        if(empty($email) || empty($password)) $errors["Required"] = "All fields are required.";
        else {
            $results = $this->query("select rcp_password from receptionist where rcp_email = '{$email}'");
            if($results->num_rows > 0) {
                $info = $results->fetch_assoc();
                if(password_verify($password,$info["rcp_password"])) return array("success" => true);
            }
            $errors["Credentials"] = "Invalid Credentials";
        }

        if(array_key_exists("Required",$errors) || array_key_exists("Credentials",$errors)) return array("success" => false, "messages" => $errors);
    }


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