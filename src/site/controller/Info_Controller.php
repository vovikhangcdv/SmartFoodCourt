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
            $data['info'] = $data['current_user'];
        }
        if ($this->auth->isAdmin()) {
            $this->load_header('header_Admin',$data);
            $this->view->load('info_Admin',$data);
            $this->load_footer('footer_Admin',$data);
        }
        else {
            $this->load_header('header',$data);
            $this->view->load('slider',$data);
            $this->view->load('info_User',$data);
            $this->load_footer('footer',$data);        }
    }


}