<?php
$myToken = bin2hex(openssl_random_pseudo_bytes(24));
$_SESSION['token'] = $myToken;
?>