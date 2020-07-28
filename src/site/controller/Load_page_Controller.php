<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Load_page_Controller extends Base_Controller {
    public function indexAction() {
        $list_page = array('about_us','contact','our_team');
        $page = basename($_GET['page']);
        $data = array();
        $data['header_hold'] = TRUE;
        $this->load_header('header',$data);
        if (in_array($page,$list_page)) {
            $this->view->load($page,$data);
        }
        else $this->view->load('404',$data);
        $this->view->load('footer',$data);
    }
}
