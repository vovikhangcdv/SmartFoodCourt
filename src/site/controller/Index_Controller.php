<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Index_Controller extends Auth_Controller {
    public function indexAction(){
        $data = array('title' => 'Dashboard');
        $this->view->load('header',$data);
        $this->view->load('core',$data);
        $this->view->load('footer',$data);
        die(header('Location: index.php?c=management'));
    }
}
