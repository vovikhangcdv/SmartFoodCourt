<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Management_Controller extends Auth_Controller
{
    public function __construct() {
        parent::__construct();
        $this->authenticate_by_role(0);
    }
    public function indexAction(){
        global $Database;
        $this->model->load('Db');
        $data['title'] = 'Management';
        $data['list_user'] = get_all_user_join_role($Database);
        $this->load_header('header_Admin',$data);
        $this->view->load('management_Admin',$data);
        $this->load_footer('footer_Admin',$data);
    }

}