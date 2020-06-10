<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
/**
 * Hàm chạy ứng dụng
 */
function load()
{
    global $Database;
    // Lấy phần config khởi tạo ban đầu
    $config = include_once PATH_APPLICATION . '/config/init.php';

    // Nếu không truyền controller thì lấy controller mặc định
    $controller = empty($_GET['c']) ? $config['default_controller'] : $_GET['c'];
 
    // Nếu không truyền action thì lấy action mặc định 
    $action = empty($_GET['a']) ? $config['default_action'] : $_GET['a'];
 
    // Chuyển đổi tên controller vì nó có định dạng là {Name}_Controller
    $controller = ucfirst(strtolower($controller)) . '_Controller';
    $controller = basename($controller);
    
    // chuyển đổi tên action vì nó có định dạng {name}Action
    $action = strtolower($action) . 'Action';
     
    // Kiểm tra file controller có tồn tại hay không
    if (!file_exists(PATH_APPLICATION . '/controller/' . $controller . '.php')){
        die ('Không tìm thấy controller');
    }
     
    // Include controller chính để các controller con nó kế thừa
    include_once PATH_SYSTEM . '/core/Controller.php';
     
    // Load Base_Controller
    if (file_exists(PATH_APPLICATION . '/core/Base_Controller.php') and file_exists(PATH_APPLICATION . '/core/Auth_Controller.php')){
        include_once PATH_APPLICATION . '/core/Base_Controller.php';
        include_once PATH_APPLICATION . '/core/Auth_Controller.php';
    }
    else die('Can not load library!');

    // Gọi file controller vào
    require_once PATH_APPLICATION . '/controller/' . $controller . '.php';
 
    // Kiểm tra class controller có tồn tại hay không
    if (!class_exists($controller)){
        die ('Không tìm thấy controller');
    }
 
    // Khởi tạo controller
    $controllerObject = new $controller();
 
    // Kiểm tra action có tồn tại hay không
    if ( !method_exists($controllerObject, $action)){
        die ('Không tìm thấy action');
    }
     
    // Chạy ứng dụng
    $controllerObject->{$action}();
}