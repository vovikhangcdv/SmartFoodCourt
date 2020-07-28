<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Index_Controller extends Base_Controller {
    public function indexAction(){
        global $Database;
        $this->model->load('Db');
        $data = array('title' => 'BK Smart Food Court');
        $list_vendor = get_all_by_tablename($Database,'vendor');
        $number_vendor = count($list_vendor);
        $data['number_vendors'] = $number_vendor;
        $data['number_products'] = count(get_all_by_tablename($Database,'product'));
        $data['number_customers'] = count(get_all_by_column($Database,'user','role',4));
        $data['number_orders'] = (count_distinct($Database,'orders','order_id'))['counter'];
        for ($i = 0; $i < $number_vendor; $i++) {
            $data['list_vendor'][$list_vendor[$i]['id']]['categories'] = get_category_products_of_vendor($Database,$list_vendor[$i]['id']);
            $data['list_vendor'][$list_vendor[$i]['id']]['products'] = get_products_of_vendor($Database,$list_vendor[$i]['id']);

        } 
        if(isset($_GET['vendor_id'])) $data['vendor_id'] = intval($_GET['vendor_id']); 
        else $data['vendor_id'] = 1;
        // Load list vendors
        $data['vendors'] = get_all_by_tablename($Database,'vendor');
        for ($i=0; $i < count($data['vendors']); $i++){
            $data['vendors'][$i]['products'] = get_all_by_column($Database,'product','vendor_id',$data['vendors'][$i]['id']);
            $number_of_food = count($data['vendors'][$i]['products']);
            if ($number_of_food > 2 and $number_of_food < 5){
                // die('ok');
                for ($j=$number_of_food;$j < 5;$j++){
                    $data['vendors'][$i]['products'][$j] = $data['vendors'][$i]['products'][rand(0,$number_of_food-1)];
                }
            }
        }
        $this->load_header('header',$data);
        $this->view->load('slider',$data);
        $this->view->load('about_us',$data);
        $this->view->load('counter',$data);
        $this->view->load('our_team',$data);
        $this->view->load('vendor_list',$data);
        $this->view->load('contact',$data);
        $this->view->load('client_testimonical',$data);
        $this->view->load('map',$data);
        $this->view->load('another',$data);
        $this->view->load('footer',$data);
    }
}
