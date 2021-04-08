<?php

namespace Models;

use mysqli;

/**
 * The BaseModel that represents a basic connection to a database.
 */
abstract class BaseModel extends mysqli {
    protected const host = "localhost";
    protected const user = "root";
    protected const password = "";
    protected const database = "project";
    protected const port = "3307";
    

    public function __construct() {
        parent::__construct(self::host,self::user,self::password,self::database,self::port);
    }
    protected function register_errors(string $name, string $address, string $email, string $phone, string $password, string $confirm): array {
        $errors = array();
        if(empty(trim($name)) || empty(trim($address)) || empty(trim($email)) || empty(trim($phone)) || empty(trim($password)) || empty(trim($confirm))) {
            $errors["Required"] = "All fields are required.";
        }
        else {
            if(trim($password) != trim($confirm)) {
                $errors["Password"] = "Please ensure Password and Confirm Password are the same.";
            }
        }
        return $errors;
    }

    abstract protected function validate_registration(string $name, string $address, string $email, string $phone, string $password, string $confirm): array;

    abstract protected function validate_login(string $email, string $password): array;

    abstract protected function authenticate(string $email, string $password): array;

    abstract protected function register(string $name, string $address, string $email, string $phone, string $password, string $confirm): array;

    abstract protected function get_all(): array;

}

?>