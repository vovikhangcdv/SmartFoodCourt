<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
/**
 * @package     MVC Framework
 * @author      Vo Vi Khang (DoubleVKay)
 * @email       khangvv1@viettel.com.vn
 * @copyright   Copyright (c) 2020
 * @since       Version 1.0
 * @filesource  system/core/loader/Auth_Loader.php
 */
class Auth_Loader {
    private $db = NULL;
    public $username = NULL;
    protected $info = NULL;
    private $role = NULL;
    public function __construct() {
        global $Database;
        $this->db = $Database;
        // Get Role
        if (isset($_SESSION['username'])) {
            $this->username = $_SESSION['username'];
            $statement = "SELECT role FROM user WHERE username=?";
            $result = $this->db->query($statement, 's', array($this->username));
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $this->role = $row['role'];
            }
        }
    }
    public function isLogin() {
        return $this->username !== NULL;
    }
    public function isAdmin() {
        return $this->role === 0;
    }
    public function isTeacher() {
        return $this->role === 1;
    }
    public function isStudent() {
        return $this->role === 2;
    }
    /**
     * @function: login
     *
     * @return: message
     */
    public function login($username, $password) {
        if (!$this->checkvalid($username, $password)) return 'Username or password must be [a-zA-Z0-9-_.@] and max length is 32';
        $statement = "SELECT * FROM user WHERE username=?";
        $result = $this->db->query($statement, "s", array($username));
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $this->username = $row['username'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                # Add token to protect CSRF
                $token = bin2hex(openssl_random_pseudo_bytes(24));
                $_SESSION['token'] = $token;
                
                $this->role = $row['role'];
                return 'Login Success!';
            }
        }
        return 'Incorrect username or password.';
    }
    public function logout() {
        session_unset();
        session_destroy();
        die(header('Location: /index.php?c=login'));
    }
    private function checkvalid($username, $password) {
        return (preg_match('/^[@A-Za-z0-9_.-]{5,32}$/', $username) && preg_match('/^[@A-Za-z0-9_.-]{6,32}$/', $password));
    }
    /**
     * @function: signup
     *
     * @return: message
     */
    public function signup($username, $fullname, $password, $email, $sdt, $role) {
        if (!$this->checkvalid($username, $password)) return 'Username or password must be [a-zA-Z0-9-_.@] and max length is 32';
        $statement = "SELECT * FROM user WHERE username=?";
        $result = $this->db->query($statement, "s", array($username));
        if ($result->num_rows > 0) {
            return 'User existed!';
        } else {
            $statement = "INSERT INTO user (username,fullname,password,email,sdt,role) VALUES (?,?,?,?,?,?)";
            $this->db->query($statement, "sssssi", array($username, $fullname, password_hash($password, PASSWORD_BCRYPT), $email, $sdt, $role));
            if ($this->db->getError()) return 'Sign up failed!';
            return 'Sign up successfully!';
        }
    }

    public function update($username, $fullname, $password, $email, $sdt, $new_username) {
        if ($username !== $new_username){
            if (!$this->checkvalid($new_username, $password)) return 'Username or password must be [a-zA-Z0-9-_.@] and max length is 32';
            $statement = "SELECT * FROM user WHERE username=?";
            $result = $this->db->query($statement, "s", array($new_username));
            if ($result->num_rows > 0) {
                return 'Username existed!';
            }
            $statement = "SELECT * FROM user WHERE username=?";
            $result = $this->db->query($statement, "s", array($username));
            $row = $result->fetch_assoc();
            if ($row['role'] !==2 and $_SESSION['username']!==$username ){
                return 'You don not have permission.';
            }
        }
        if ($username == $this->username){
            $this->username = $new_username;
            $_SESSION['username'] = $this->username;
        }
        if (!$this->checkvalid($username, $password)) return 'Username or password must be [a-zA-Z0-9-_.@] and max length is 32';
        $statement = "SELECT * FROM user WHERE username=?";
        $result = $this->db->query($statement, "s", array($username));
        $row = $result->fetch_assoc();
        if ($result->num_rows == 0) {
            return 'User not exist!';
        } 
        else {
            $statement = "UPDATE user SET username=?,fullname=?,password=?,email=?,sdt=? where username=?";
            $this->db->query($statement, "ssssss", array($new_username, $fullname, password_hash($password, PASSWORD_BCRYPT), $email, $sdt, $username));
            if ($this->db->getError()) return 'Update failed!';
            return 'Update successfully!';
        }
    }
    // public function edit($username,$email,$sdt)
}
