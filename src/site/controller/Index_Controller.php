<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Index_Controller extends Base_Controller {
    public function indexAction(){
        global $Database;
        $this->model->load('Db');
        // $this->config->load('debug_config');
        $data = array('title' => 'BK Smart Food Court');
        $list_vendor = get_all_by_tablename($Database,'vendor');
        $number_vendor = count($list_vendor);
        for ($i = 0; $i < $number_vendor; $i++) {
            $data['list_vendor'][$list_vendor[$i]['id']]['categories'] = get_category_products_of_vendor($Database,$list_vendor[$i]['id']);
            $data['list_vendor'][$list_vendor[$i]['id']]['products'] = get_products_of_vendor($Database,$list_vendor[$i]['id']);

        } 
        if(isset($_GET['vendor_id'])) $data['vendor_id'] = intval($_GET['vendor_id']); 
        else $data['vendor_id'] = 1;
        $this->load_header('header',$data);
        $this->view->load('slider',$data);
        $this->view->load('about_us',$data);
        $this->view->load('counter',$data);
        $this->view->load('menu',$data);
        $this->view->load('reservation',$data);
        $this->view->load('gallery',$data);
        $this->view->load('client_testimonical',$data);
        $this->view->load('subscription',$data);
        $this->view->load('chief',$data);
        $this->view->load('lastest_news',$data);
        $this->view->load('contact',$data);
        $this->view->load('map',$data);
        $this->view->load('another',$data);
        $this->view->load('footer',$data);
    }
    public function menuAction(){
                // $this->config->load('debug_config');
        global $Database;
        $this->model->load('Db');
        $data = array('title' => 'BK Smart Food Court');
        $list_vendor = get_all_by_tablename($Database,'vendor');
        $number_vendor = count($list_vendor);
        for ($i = 0; $i < $number_vendor; $i++) {
            $data['list_vendor'][$list_vendor[$i]['id']]['categories'] = get_category_products_of_vendor($Database,$list_vendor[$i]['id']);
            $data['list_vendor'][$list_vendor[$i]['id']]['products'] = get_products_of_vendor($Database,$list_vendor[$i]['id']);

        }
        if(isset($_GET['vendor_id'])) $data['vendor_id'] = intval($_GET['vendor_id']); 
        else $data['vendor_id'] = 1;
        $this->view->load('header',$data);
        $this->view->load('slider',$data);
        $this->view->load('menu',$data);
        $this->view->load('footer',$data);
    }

    public function modify_menuAction(){
        $this->view->load('header',$data);
        $this->view->load('slider',$data);
        $this->view->load('modify_menu',$data);
        $this->view->load('footer',$data);
    }
    public function testAction(){
        // $this->view->load('header',$data);
        // $this->view->load('slider',$data);
        $this->view->load('history_page',$data);
        // $this->view->load('footer',$data);
    }
}
