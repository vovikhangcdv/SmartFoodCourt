<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Index_Controller extends Base_Controller {
    public function indexAction(){
        $data = array('title' => 'BK Smart Food Court');
        $this->view->load('index',$data);
        // $this->view->load('header',$data);
        // $this->view->load('core',$data);
        // $this->view->load('footer',$data);
    }
}
