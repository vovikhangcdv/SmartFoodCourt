<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Base_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function load_header($header_name,$data) {
        // Load nội dung footer
        global $Database;
        $this->model->load('Db');
        $data['header']['user'] = get_user($Database,$this->auth->username);
        if ($this->auth->isVendorOwner() or $this->auth->isCook()){
            $data['header']['vendor'] = get_user($Database,$this->auth->username);
        }
        $data['header']['vendor'] = get_user($Database,$this->auth->username);
        if ($this->auth->isLogin()){
            $unchecked_message = get_unchecked_message($Database,get_user($Database,$this->auth->username)['id']);
            foreach ($unchecked_message as $message){
                $data['unchecked_message'][$message['sender_id']]['fullname'] = get_user_by_id($Database,$message['sender_id'])['fullname'];
                $data['unchecked_message'][$message['sender_id']]['message'][] = $message;
            }
        }
        $this->view->load($header_name,$data);
        
    }
    public function load_footer($footer_name,$data) {
        // Load nội dung header
        $this->view->load($footer_name,$data);
        
    }
    // Hàm hủy này có nhiệm vụ show nội dung của view, lúc này các controller
    // không cần gọi đến $this->view->show nữa
    public function __destruct() {
        $this->view->show();
    }
}
