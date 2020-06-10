<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class DB{
    private $db = null;
    public function __construct()
    {
        mb_internal_encoding( 'UTF-8' );
        mb_regex_encoding( 'UTF-8' );
        try {
            $this->db = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
            $this->db->set_charset( "utf8" );
        } catch ( Exception $e ) {
            die( 'Unable to connect to database' );
        }
    }

    public function __destruct(){
        $this->db->close();
    }

    public function query($query,$string_bind_param,$array_value_of_bind_param){
        if (strlen($string_bind_param) !== count($array_value_of_bind_param)) return False;
        $stmt = $this->db->prepare( $query );
        $stmt->bind_param($string_bind_param, ...$array_value_of_bind_param);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    public function getError(){
        return $this->db->errno;
    }
}