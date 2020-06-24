<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Modify_menu_Controller extends Base_Controller {
    public function indexAction() {
        $data = array();
        $this->load_header('header',$data);
        $this->view->load('slider',$data);
        $this->view->load('modify_menu',$data);
        $this->view->load('footer',$data);
    }
}
