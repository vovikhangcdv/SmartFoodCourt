<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
function get_all_user($Database) {
$result = $Database->query("SELECT * FROM user", '', array());
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output;
    } else return false;
}
function delete_user($Database, $username) {
    $statement = "DELETE FROM user where username=?";
    $result = $Database->query($statement, 's', array($username));
    return $Database->getError();
}
function get_user($Database,$username){
    $statement = "SELECT * from user where username=?";
    $result = $Database->query($statement, "s", array($username));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output[0];
    } else return false;
}
function get_all_student($Database) {
    $result = $Database->query("SELECT * FROM user where role=2", '', array());
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output;
    } else return false;
}
function get_user_by_id($Database,$id){
    $statement = "SELECT * from user where id=?";
    $result = $Database->query($statement, "i", array($id));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output[0];
    } else return false;
}
function delete_by_id($Database,$table,$id){
    $statement = "DELETE FROM ${table} where id=?";
    $result = $Database->query($statement, 'i', array($id));
    return $Database->getError();
}
function get_by_id($Database,$table,$id){
    $statement = "SELECT * from ${table} where id=?";
    $result = $Database->query($statement, "i", array($id));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output[0];
    } else return false;
}
function get_max_id_of_table($Database,$table){
    $statement = "SELECT max(id) as max from ${table}";
    $result = $Database->query($statement, "", array());
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output[0];
    } else return false;
}
function get_all_by_tablename($Database,$table){
    $result = $Database->query("SELECT * FROM ${table}", '', array());
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output;
    } else return false;
}
function insert_message($Database,$sender_id,$receiver_id,$message,$timestamp,$checked=0){
    $statement = "INSERT INTO message (sender_id,receiver_id,message,timestamp,checked) values (?,?,?,?,?)";
    $Database->query($statement, "iisii", array($sender_id,$receiver_id,$message,$timestamp,$checked));
    return $Database->getError();
}
function get_all_message_of_user($Database,$user_id){
    $result = $Database->query("SELECT * FROM message where sender_id = ? or receiver_id = ?", 'ii', array($user_id,$user_id));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output;
    } else return false;
}
function get_messages_of_2_user($Database,$userid_1,$userid_2){
    $result = $Database->query("SELECT * FROM message where ((sender_id = ? and receiver_id = ?) or (sender_id = ? and receiver_id = ?)) ORDER BY timestamp ASC", 'iiii', array($userid_1,$userid_2,$userid_2,$userid_1));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output;
    }
}
function get_unchecked_message($Database,$receiver_id){
    $result = $Database->query("SELECT * FROM message where receiver_id = ? and checked = ? ORDER BY timestamp DESC", 'ii', array($receiver_id,0));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output;
    } else return false;
}
function check_message($Database,$sender_id,$receiver_id){
    $statement = "UPDATE message SET checked = 1 where sender_id= ? and receiver_id = ?";
    $Database->query($statement, "ii", array($sender_id,$receiver_id));
    return $Database->getError();
}
function get_products_of_vendor($Database,$vendor_id){
    $result = $Database->query("SELECT * FROM product where vendor_id = ?", 'i', array($vendor_id));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output;
    } else return false;
}
?>