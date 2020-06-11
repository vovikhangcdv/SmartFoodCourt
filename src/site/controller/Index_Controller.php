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
        // var_dump($data['list_vendor'][1]['products']);
        // $this->view->load('test',$data);
        $data['vendor_id'] = 1;
        $this->view->load('index',$data);
        // $this->view->load('header',$data);
        // $this->view->load('core',$data);
        // $this->view->load('footer',$data);
    }
    public function menuAction(){
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
        $data['vendor_id'] = 1; 
        $this->view->load('header',$data);
        $this->view->load('menu',$data);
        $this->view->load('footer',$data);
    }
}
