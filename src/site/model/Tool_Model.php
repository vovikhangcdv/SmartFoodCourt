<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
function xss_filter($str) {
    return htmlentities($str,ENT_QUOTES, "UTF-8");
}