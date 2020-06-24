<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Signup_Controller extends Base_Controller
{
    public function indexAction()
    {
        $data['title'] = 'Sign Up';
        $this->model->load('checker');
        if (isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email']) and isset($_POST['sdt'])){
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
                if ($this->auth->isAdmin() and isset($_POST['role'])){
                    if (!isset($_POST['token']) or ($_POST['token']!==$_SESSION['token'])) die('Invalid token!');
                    $data['message'] = $this->auth->signup($_POST['username'],$_POST['fullname'],$_POST['password'],$_POST['email'],$_POST['sdt'],intval($_POST['role']),intval($_POST['vendor_id']));
                }
                else $data['message'] = $this->auth->signup($_POST['username'],$_POST['fullname'],$_POST['password'],$_POST['email'],$_POST['sdt'],4);
                $data['return'] = ($data['message'] == "Sign up successfully!");
                $data['message'] = $data['message']." <a href='".PATH_INDEX."?c=login'> Login</a>";
            }
        }
        if ($this->auth->isAdmin()){
            global $Database;
            $this->model->load('Db');
            $data['title'] = 'Add User';
            $data['list_role'] = get_all_by_tablename($Database,'user_role');
            $data['list_vendor'] = get_all_by_tablename($Database,'vendor');
            if (isset($data['return']) and ($data['return'] == true)) $data['message'] = 'Success.';
            $this->load_header('header_Admin',$data);
            $this->view->load('add_user_Admin',$data);
            $this->load_footer('footer_Admin',$data);
        }
        else $this->view->load('signup',$data);
    }


}