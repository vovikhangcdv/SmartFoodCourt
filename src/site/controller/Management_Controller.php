<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Management_Controller extends Auth_Controller
{
    public function indexAction(){
        global $Database;
        $this->model->load('Db');
        $data['title'] = 'Management';
        $data['list_user'] = get_all_user($Database);
        $this->load_header('header',$data);
        $this->view->load('management',$data);
        $this->load_footer('footer',$data);
    }

    public function deleteuserAction() {
        if (!$this->auth->isTeacher() and !$this->auth->isAdmin()) return $this->indexAction();
        global $Database;
        $this->model->load('Db');
        if (isset($_POST['username'])) {
            if (!isset($_POST['token']) or ($_POST['token']!==$_SESSION['token'])) die('Invalid token!');
            $user = get_user($Database,$_POST['username']);
            if ($user['role'] !== 2) $data['message'] = "You dont have permission";
            else delete_user($Database, $_POST['username']);
        }
        $this->indexAction();
    }

}