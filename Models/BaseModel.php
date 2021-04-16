<?php


/**
 * The BaseModel that represents a basic connection to a database.
 */
abstract class BaseModel extends mysqli {
    protected const host = "localhost";
    protected const user = "root";
    protected const password = "";
    protected const database = "project";
    protected const port = "3307";
    protected const password_regex = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
    

    public function __construct() {
        parent::__construct(self::host,self::user,self::password,self::database,self::port);
        if($this->connect_error) die("Connection Issue: ".$this->connect_error);
    }

    /**
     * Searches for common registration errors found.
     * @param string $fname first name of the user.
     * @param string $lname last name of the user.
     * @param string $address address of the user.
     * @param string $email email of the user.
     * @param string $phone phone number of the user.
     * @param string $password password of the user.
     * @param string $confirm password that is entered for the second time.
     * @return array Errors found.
     */
    protected function register_errors(string $fname, string $lname, string $address, string $email, string $phone, string $password, string $confirm): array {
        $errors = array();
        if(empty(trim($fname)) || empty(trim($lname)) || empty(trim($address)) || empty(trim($email)) || empty(trim($phone)) || empty(trim($password)) || empty(trim($confirm))) {
            $errors["Required"] = "All fields are required.";
        }
        else {
            if(trim($password) != trim($confirm)) {
                $errors["Password"] = "Please ensure Password and Confirm Password are the same.";
            }
            if(!preg_match(self::password_regex,$password)) {
                $errors["Strength"] = "Password is not strong enough. Must contain the following: A minimum length of 8 characters, at least one digit, special character and uppercase letter.";
            }
        }
        return $errors;
    }

    abstract protected function validate_registration(string $fame, string $lname, string $address, string $email, string $phone, string $password, string $confirm): array;

    abstract protected function validate_login(string $email, string $password): array;

    abstract protected function authenticate(string $email, string $password): array;

    abstract protected function register(string $fname, string $lname, string $address, string $email, string $phone, string $password, string $confirm): array;

    abstract protected function get_all(): array;

    abstract protected function get_current_user($id): array;

}

?>