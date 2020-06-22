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

    public function update($username, $fullname, $password, $email, $sdt) {
        $statement = "SELECT * FROM user WHERE username=?";
        $result = $this->db->query($statement, "s", array($username));
        $row = $result->fetch_assoc();
        if ($result->num_rows == 0) {
            return 'User not exist!';
        } 
        else {
            if ($password === ''){
                $statement = "UPDATE user SET fullname=?,email=?,sdt=? where username=?";
                $this->db->query($statement, "ssss", array($fullname, $email, $sdt, $username));
            }
            else {
                if (!$this->checkvalid($username, $password)) return 'Username or password must be [a-zA-Z0-9-_.@] and max length is 32';
                $statement = "UPDATE user SET fullname=?,password=?,email=?,sdt=? where username=?";
                $this->db->query($statement, "sssss", array($fullname, password_hash($password, PASSWORD_BCRYPT), $email, $sdt, $username));
            }
            if ($this->db->getError()) return 'Update failed!';
            return 'Update successfully!';
        }
    }
}
