<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Index_Controller extends Base_Controller {
    public function indexAction(){
        global $Database;
        $this->model->load('Db');
        $data = array('title' => 'BK Smart Food Court');
        $data['list_products'] = get_all_by_tablename($Database,'product');
        $data['list_category'] = get_all_by_tablename($Database,'category');
        // $data['list_product_of_vender'] = get_products_of_vendor($Database,2);
        // $data['list_vendor'] = get_vendor($Database);
        // var_dump($data);
        $this->view->load('index',$data);
        // $this->view->load('header',$data);
        // $this->view->load('core',$data);
        // $this->view->load('footer',$data);
    }
}
