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
                    $data['message'] = $this->auth->signup($_POST['username'],$_POST['fullname'],$_POST['password'],$_POST['email'],$_POST['sdt'],intval($_POST['role']));
                }
                else $data['message'] = $this->auth->signup($_POST['username'],$_POST['fullname'],$_POST['password'],$_POST['email'],$_POST['sdt'],4);
                $data['return'] = ($data['message'] == "Sign up successfully!");
                $data['message'] = $data['message']." <a href='".PATH_INDEX."?c=login'> Login</a>";
            }
        }
        if ($this->auth->isAdmin()){
            $data['title'] = 'Add User';
            if (isset($data['return']) and ($data['return'] == true)) $data['message'] = 'Success.';
            $this->load_header('header',$data);
            $this->view->load('admin_add_user',$data);
            $this->load_footer('footer',$data);
        }
        else $this->view->load('signup',$data);
    }


}