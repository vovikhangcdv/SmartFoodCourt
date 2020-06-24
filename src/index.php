<?php
// Start Session
ob_start();
session_start(); 
// Đường dẫn tới hệ  thống
define('PATH_ROOT', __DIR__ );
define('PATH_SYSTEM', __DIR__ .'/system');
define('PATH_APPLICATION', __DIR__ . '/site');
date_default_timezone_set('Asia/Ho_Chi_Minh');
// Lấy thông số cấu hình
require (PATH_SYSTEM . '/config/config.php');
//mở file Common.php, file này chứa hàm Load() chạy hệ thống
include_once PATH_SYSTEM . '/core/Common.php';

// Connect DB 
require_once(PATH_APPLICATION . '/config/dbconfig.php');
require_once(PATH_SYSTEM . '/library/DB_Library.php');
$Database = new DB();

// Chương trình chính
load();