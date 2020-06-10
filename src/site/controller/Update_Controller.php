<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Update_Controller extends Auth_Controller
{
    public function indexAction(){
        global $Database;
        $this->model->load('Db');
        $this->model->load('checker');
        $data['return'] = true;
        $data['title'] = "Update";
        if (isset($_POST['username']) and get_user($Database,$_POST['username'])!= false and ($this->auth->isTeacher() or ($this->auth->isAdmin()))){
            $username = $_POST['username'];
            if ($_POST['new_username'] == '') $new_username = $username;
            else $new_username = $_POST['new_username'];
        }
        else {
            $username = $this->auth->username;
            $new_username = $username;
        }
        $data['info'] = get_user($Database,$username);
        if (isset($_POST['password']) and isset($new_username) and isset($_POST['repeat_password']) and isset($_POST['email']) and isset($_POST['sdt']) and isset($_POST['fullname'])){
            if (!isset($_POST['token']) or ($_POST['token']!==$_SESSION['token'])) die('Invalid token!');
            $data['return'] = false;
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
                $data['message'] = $this->auth->update($username,$_POST['fullname'],$_POST['password'],$_POST['email'],$_POST['sdt'],$new_username);
                $data['return'] = ($data['message']=="Update successfully!");
                $data['info'] = get_user($Database,$new_username);
            }
        }
        $this->load_header('header',$data);
        $this->view->load('update',$data);
        $this->load_footer('footer',$data);
    }


}