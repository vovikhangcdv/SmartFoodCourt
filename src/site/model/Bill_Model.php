<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
function check_valid_email($email){
    return (filter_var($email, FILTER_VALIDATE_EMAIL));
}
?>