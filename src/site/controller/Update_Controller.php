<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Update_Controller extends Auth_Controller
{
    public function indexAction(){
        global $Database;
        // $this->config->load('debug_config');
        $this->model->load('Db');
        $this->model->load('checker');
        $data['return'] = true;
        $data['title'] = "Update";
        if (isset($_POST['username']) and ($this->auth->isAdmin())){
            $username = $_POST['username'];
        }
        else {
            $username = $this->auth->username;
        }
        $data['info'] = get_user($Database,$username);
        if (isset($_POST['password']) and isset($_POST['repeat_password']) and isset($_POST['email']) and isset($_POST['sdt']) and isset($_POST['fullname'])){
            if (!isset($_POST['token']) or ($_POST['token']!==$_SESSION['token'])) die('Invalid token!');
            $data['return'] = false;
            // Skip update password
            if ($_POST['password'] !== $_POST['repeat_password']) {
                $data['message'] = "Repeat password not match";
            }
            else if (!check_valid_email($_POST['email'])){
                $data['message'] = "Invalid email";
            }
            else if (!check_valid_sdt($_POST['sdt'])){
                $data['messgage'] = "Invalid phone number";
            }
            else if (!check_valid_fullname($_POST['fullname'])){
                $data['messgage'] = "Invalid full name";
            }
            else {
                $data['message'] = $this->auth->update($username,$_POST['fullname'],$_POST['password'],$_POST['email'],$_POST['sdt']);
                $data['return'] = ($data['message']=="Update successfully!");
                $data['info'] = get_user($Database,$username);
            }
        }
        if ($this->auth->isAdmin()) {
            $this->load_header('header_Admin',$data);
            $this->view->load('update_Admin',$data);
            $this->load_footer('footer_Admin',$data);
        }
        else {
            $this->load_header('header',$data);
            $this->view->load('slider',$data);
            $this->view->load('update_User',$data);
            $this->load_footer('footer',$data); 
        }
    }


}