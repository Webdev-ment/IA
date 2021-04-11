<?php


/**
 * The BaseModel that represents a basic connection to a database.
 */
 abstract class BaseModel extends mysqli {
    protected const host = "localhost";
    protected const user = "root";
    protected const password = "";
    protected const database = "project";
    protected const port = "3306";
    

    public function __construct() {
    parent::__construct(self::host,self::user,self::password,self::database, self::port);
    
    // try{
    //     $conn = new mysqli(host, user, password, database);
    //     }
    //     catch (\Exception $e)
    //     {
    //         if($conn->$connect_error)
    //         {echo $e->getMessage("Connection Failed." . $connect_error);}
    //     }

     // Create connection
 
    }

    /**
     * Searches for common registration errors found.
     * @param string $name name of the user.
     * @param string $address address of the user.
     * @param string $email email of the user.
     * @param string $phone phone number of the user.
     * @param string $password password of the user.
     * @param string $confirm password that is entered for the second time.
     * @return array Errors found.
     */

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
