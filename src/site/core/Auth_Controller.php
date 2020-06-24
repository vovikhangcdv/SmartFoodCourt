<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Auth_Controller extends Base_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->auth->isLogin() === False) {
            die(header('Location: /index.php?c=login'));
        }
        // Get vendor_id of user
        global $Database;
        $this->model->load('Db');
        if ($this->auth->isVendorOwner() or $this->auth->isCook()){
            $_SESSION['own_vendor_id'] = get_vendor_id_by_user_id($Database,get_user($Database,$this->auth->username)['id'])['vendor_id'];
        }
        else $_SESSION['own_vendor_id'] = -1;
    }
    public function authenticate_by_role($role){
        if ($_SESSION['role'] === $role) return true;
        else die(header('Location: /index.php?c=login'));
    }
}
