<?php

include_once 'Session.php';
include 'Database.php';


class User{

    // private $stmt;

    public $name = '';
    public $username    = '';
    public $email       = '';
    public $password    = '';

    public $error = array('name' => '', 'username' => '', 'email' => '', 'password' => '');
    
    public function __construct() {
        
        $this->db = new Database();
        
    }

    private function validate($data) {
        
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;

    }

    public function checkEmail($email) {
        
        $sql = "SELECT email from tbl_user WHERE email = :email";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
        
    }

    public function userregister($reg_data) {

        if (empty($reg_data['name'])) {
            $this->error['name'] = 'Name is required';
        } else {
            $this->name = $reg_data['name'];
        }


        if (empty($reg_data['username'])) {
            $this->error['username'] = 'Username is required';
        } elseif (strlen($reg_data['username']) < 3) {
            $this->error['username'] = 'Username must be more than 3 characters';
        } else {
            $this->username = $this->validate($reg_data['username']);
        }


        if (empty($reg_data['email'])) {
            $this->error['email'] = 'Email is required';
        } elseif (!filter_var($reg_data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->error['email'] = 'Required a valid email';
        }  else {
            $this->email = $this->validate($reg_data['email']);
        }

        // elseif ($this->checkEmail($reg_data['email'])) {
        //     $this->error['email'] = 'This email already exists';
        // }

        if (empty($reg_data['password'])) {
            $this->error['password'] = 'Password is required';
        } elseif (strlen($reg_data['password']) < 6) {
            $this->error['password'] = 'Password at least 6 characters long';
        } else {
            $this->password = $reg_data['password'];
        }

        
        if (array_filter($this->error)) {
            return $this->error;
        } else {
            



            return ['success woohoo'];
        }

        
        
    }
    
}



?>