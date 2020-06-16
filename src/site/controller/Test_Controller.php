<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Test_Controller extends Base_Controller {
    public function indexAction() {
        $data = array();
        $this->load_header('header',$data);
        $this->view->load('slider',$data);
        $this->view->load($_GET['page'],$data);
        $this->view->load('footer',$data);
    }
}
