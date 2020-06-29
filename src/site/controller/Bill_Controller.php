<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Bill_Controller extends Auth_Controller {
    public function getBillCustomerAction(){
        global $Database;
        $this->model->load('Db');
        $this->library->load('Bill');
        $orders = get_all_by_column($Database,'orders','customer_id',get_user($Database,$this->auth->username)['id']);

        foreach ($orders as $stt=>$order){
            $list_bill[$order['order_id']]['vendor'] = get_by_id($Database,'vendor',$order['vendor_id']);
            $list_bill[$order['order_id']]['user'] = get_by_id($Database,'user',$order['customer_id']);
            $list_bill[$order['order_id']]['timestamp_order'] = $order['timestamp_order'];
            $list_bill[$order['order_id']]['timestamp_finish'] = $order['timestamp_finish'];
            $list_bill[$order['order_id']]['list_orders'][$order['product_id']]= $order['quantity'];
        }
        foreach ($list_bill as $order_id => $bill){
            $temp_bill = new Bill_Library();
            $temp_bill->generate_bill($Database,$bill['user'],$bill['vendor'],$bill['timestamp_order'],$bill['timestamp_finish'],$bill['list_orders']);
            $data['list_bill'][$order_id]['user'] = $temp_bill->get_user();
            $data['list_bill'][$order_id]['vendor'] = $temp_bill->get_vendor();
            $data['list_bill'][$order_id]['orders'] = $temp_bill->get_orders();
            $data['list_bill'][$order_id]['timestamp_order'] = $temp_bill->get_timestamp_order();
            $data['list_bill'][$order_id]['timestamp_finish'] = $temp_bill->get_timestamp_finish();
            $data['list_bill'][$order_id]['additional_money'] = $temp_bill->get_additional_money();
            $data['list_bill'][$order_id]['total'] = $temp_bill->get_total();
        }
        $this->load_header('header',$data);
        $this->view->load('slider',$data);
        $this->view->load('history_customer',$data);
        $this->view->load('footer',$data);
    }
    public function getBillCookAction(){
        $this->authenticate_by_role(3);
        global $Database;
        $this->model->load('Db');
        $this->library->load('Bill');
        $orders = get_order_cook($Database,$_SESSION['own_vendor_id']);
        foreach ($orders as $stt=>$order){
            $list_bill[$order['order_id']]['vendor'] = get_by_id($Database,'vendor',$order['vendor_id']);
            $list_bill[$order['order_id']]['user'] = get_by_id($Database,'user',$order['customer_id']);
            $list_bill[$order['order_id']]['timestamp_order'] = $order['timestamp_order'];
            $list_bill[$order['order_id']]['timestamp_finish'] = $order['timestamp_finish'];
            $list_bill[$order['order_id']]['list_orders'][$order['product_id']]= $order['quantity'];
        }
        foreach ($list_bill as $order_id => $bill){
            $temp_bill = new Bill_Library();
            $temp_bill->generate_bill($Database,$bill['user'],$bill['vendor'],$bill['timestamp_order'],$bill['timestamp_finish'],$bill['list_orders']);
            $data['list_bill'][$order_id]['user'] = $temp_bill->get_user();
            $data['list_bill'][$order_id]['vendor'] = $temp_bill->get_vendor();
            $data['list_bill'][$order_id]['timestamp_order'] = $temp_bill->get_timestamp_order();
            $data['list_bill'][$order_id]['timestamp_finish'] = $temp_bill->get_timestamp_finish();
            $data['list_bill'][$order_id]['orders'] = $temp_bill->get_orders();
            $data['list_bill'][$order_id]['additional_money'] = $temp_bill->get_additional_money();
            $data['list_bill'][$order_id]['total'] = $temp_bill->get_total();
        }
        $this->load_header('header',$data);
        $this->view->load('slider',$data);
        $this->view->load('cook_view_order',$data);
        $this->view->load('footer',$data);
    }
    public function set_readyAction(){
        $this->authenticate_by_role(3);
        global $Database;
        $this->model->load('Db');
        if(isset($_POST['order_id'])){
            $orders = get_by_column($Database,'orders','order_id',intval($_POST['order_id']));
            if ($orders['vendor_id'] === $_SESSION['own_vendor_id']){
                update_by_column($Database,'orders','timestamp_finish',time(),'order_id',intval($_POST['order_id']));
            }
            else die('Unauthenticated action!');
        }
        $this->getBillCookAction();
    }
}
