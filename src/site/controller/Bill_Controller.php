<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Bill_Controller extends Auth_Controller {
    public function indexAction() {
        $data = $this->getBillCustomer();
        $this->load_header('header',$data);
        $this->view->load('slider',$data);
        $this->view->load('history_customer',$data);
        $this->view->load('footer',$data);
    }
    private function getBillCustomer(){
        global $Database;
        $this->model->load('Db');
        $this->library->load('Bill');
        $orders = get_all_by_column($Database,'orders','customer_id',get_user($Database,$this->auth->username)['id']);

        foreach ($orders as $stt=>$order){
            $list_bill[$order['order_id']]['vendor'] = get_by_id($Database,'vendor',$order['vendor_id']);
            $list_bill[$order['order_id']]['user'] = get_by_id($Database,'user',$order['customer_id']);
            $list_bill[$order['order_id']]['timestamp_order'] = $order['timestamp_order'];
            $list_bill[$order['order_id']]['list_orders'][$order['product_id']]= $order['quantity'];
        }
        foreach ($list_bill as $order_id => $bill){
            $temp_bill = new Bill_Library();
            $temp_bill->generate_bill($Database,$bill['user'],$bill['vendor'],$bill['timestamp_order'],$bill['list_orders']);
            $data['list_bill'][$order_id]['user'] = $temp_bill->get_user();
            $data['list_bill'][$order_id]['vendor'] = $temp_bill->get_vendor();
            $data['list_bill'][$order_id]['orders'] = $temp_bill->get_orders();
            $data['list_bill'][$order_id]['additional_money'] = $temp_bill->get_additional_money();
            $data['list_bill'][$order_id]['total'] = $temp_bill->get_total();
        }
        return $data;
    }
}