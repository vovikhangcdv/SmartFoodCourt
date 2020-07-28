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
    $statement = "SELECT * from user JOIN user_role where user.role = user_role.role and user.username=?";
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
    $statement = "SELECT * from user JOIN user_role where user.role = user_role.role and id=?";
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
function get_category_products_of_vendor($Database,$vendor_id){
    $result = $Database->query("SELECT * FROM category_product where vendor_id = ?", 'i', array($vendor_id));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output;
    } else return false;
}
function get_vendor($Database) {
    $result = $Database->query("SELECT * FROM user", '', array());
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output[] = $row;
            }
            return $output;
        } else return false;
    }
function get_max_order_id($Database){
    $statement = "SELECT max(order_id) as max from orders";
    $result = $Database->query($statement, "", array());
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        if ($output[0]['max'] == NULL) return 0;
        else return $output[0]['max'];
    } else return false;
}
function insert_order($Database,$order_id,$vendor_id,$customer_id,$product_id,$quantity,$timestamp_order,$timestamp_finish= -1){
    $statement = "INSERT INTO orders (order_id,vendor_id,customer_id,product_id,quantity,timestamp_order,timestamp_finish) values (?,?,?,?,?,?,?)";
    $Database->query($statement, "iiiiiii", array($order_id,$vendor_id,$customer_id,$product_id,$quantity,$timestamp_order,$timestamp_finish));
    return $Database->getError();
}
function get_by_column($Database,$table,$column,$value){
    $statement = "SELECT * from ${table} where ${column}=?";
    $result = $Database->query($statement, "i", array($value));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output[0];
    } else return false;
}
function get_all_by_column($Database,$table,$column,$value){
    $statement = "SELECT * from ${table} where ${column}=?";
    $result = $Database->query($statement, "i", array($value));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output;
    } else return false;
}
function get_order_cook($Database,$vendor_id){
    $statement = "SELECT * from orders where vendor_id = ? and timestamp_finish = -1";
    $result = $Database->query($statement, "i", array(intval($vendor_id)));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output;
    } else return false;
}
function get_order_by_order_id($Database,$order_id){
    $result = $Database->query("SELECT * FROM order where order_id = ?", 'i', array($order_id));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output;
    } else return false;
}
function get_all_user_join_role($Database) {
    $result = $Database->query("SELECT * FROM user JOIN user_role where user.role = user_role.role", '', array());
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output[] = $row;
            }
            return $output;
        } else return false;
    }
function get_vendor_id_by_user_id($Database,$user_id){
    $statement = "SELECT vendor_id from vendor_owner where user_id=?";
    $result = $Database->query($statement, "i", array(intval($user_id)));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output[0];
    } else return false;
}
function insert_vendor($Database,$name,$description,$photo){
    $statement = "INSERT INTO vendor (name,description,photo) values (?,?,?)";
    $Database->query($statement, "sss", array($name,$description,$photo));
    return $Database->getError();
}
function insert_category($Database,$catname,$vendor_id){
    $statement = "INSERT INTO category_product (catname,vendor_id) values (?,?)";
    $Database->query($statement, "si", array($catname,$vendor_id));
    return $Database->getError();
}
function insert_product($Database,$product_name,$category_id,$description,$price,$vendor_id,$photo){
    $statement = "INSERT INTO product (category_id,product_name,description,price,photo,vendor_id) values (?,?,?,?,?,?)";
    $Database->query($statement, "issisi", array($category_id,$product_name,$description,$price,$photo,$vendor_id));
    return $Database->getError();
}
function get_next_id($Database,$table,$database_name='SmartFoodCourt_DB'){
    $statement = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ?";
    $result = $Database->query($statement, "ss", array($database_name,$table));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output[0];
    } else return false;
}
function delete_by_column($Database,$table,$column,$value){
    $statement = "DELETE FROM ${table} where ${column}=?";
    $result = $Database->query($statement, 's', array($value));
    return $Database->getError();
}
function update_by_column($Database,$table, $column, $value,$condition_column, $condition_value){
    $statement = "UPDATE {$table} SET {$column} = ? where {$condition_column} = ?";
    $Database->query($statement, "ss", array($value,$condition_value));
    return $Database->getError();
}
function count_distinct($Database,$table,$column){
    $statement = "SELECT COUNT(DISTINCT ${column}) as counter FROM ${table}";
    $result = $Database->query($statement, "", array());
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return $output[0];
    } else return false;
}
?>
