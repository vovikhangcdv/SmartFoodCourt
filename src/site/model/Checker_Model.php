<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
function check_valid_email($email){
    return (filter_var($email, FILTER_VALIDATE_EMAIL));
}
function check_valid_sdt($sdt){
    return filter_var($sdt,FILTER_SANITIZE_NUMBER_INT);
}
function check_valid_fullname($fullname){
    return strlen($fullname) > 3;
}
function check_assignment_title($title){
    return (strlen($title) < 100 and strlen($title) > 0);
}
function check_valid_filename($filename,$regex='/^([-\.\w]+)$/'){
    if (!(preg_match($regex, $filename) > 0)) return false;
}
function check_valid_product_name($name){
    return (strlen($name) > 3 and strlen($name) < 20);
}
?>