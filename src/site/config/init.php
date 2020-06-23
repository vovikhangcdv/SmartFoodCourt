<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
define( 'PATH_INDEX', '../../index.php' );
define( 'PATH_ADMIN_ASSETS', '../../public/admin/' );
define( 'PATH_USER_ASSETS', '../../public/spicyX/' );
return array(
    'default_controller'    => 'index', // controller mặc định
    'default_action'        => 'index', // action mặc định
    '404_controller'        => 'error', // controller lỗi 404
    '404_action'            => 'index'  // action lỗi 404
);