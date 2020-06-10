<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Info_Controller extends Auth_Controller
{
    public function indexAction(){
        global $Database;
        $this->model->load('Db');
        $this->model->load('checker');
        $data['return'] = true;
        $data['title'] = "Info";
        $data['current_user'] = get_user($Database,$this->auth->username);
        if (isset($_GET['id']) and get_user_by_id($Database,intval($_GET['id']))!= false){
            $data['info'] = get_user_by_id($Database,intval($_GET['id']));
        }
        else {
            die(header('Location: index.php'));
        }
        $this->load_header('header',$data);
        $this->view->load('info',$data);
        $this->load_footer('footer',$data);
    }


}