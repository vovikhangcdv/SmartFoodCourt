<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Report_Controller extends Auth_Controller {
    public function indexAction(){
        $this->authenticate_by_role(2);
        global $Database;
        $this->model->load('Db');
        $this->library->load('Bill');
        $data['vendor'] = get_by_column($Database,'vendor','id',$_SESSION['own_vendor_id']);
        if (isset($_POST['date'])){
            $data['date'] = $_POST['date'];
            $time_start = strtotime($_POST['date']);
            $time_end = strtotime("+1 day",$time_start);
        }
        else if (isset($_POST['time']) and $_POST['time'] != 'all'){
            if ($_POST['time'] == 'today'){
                $time_start = strtotime((date("d-m-Y",time())));
            }
            else $time_start = strtotime($_POST['time'],time());
            $time_end = time();
        }
        else{
            $data['date'] = date('Y-m-d');
            $time_start = 0;
            $time_end = time();
        }
        $data['time'] = $_POST['time'];
        // $orders = get_all_by_column($Database,'orders','vendor_id',$_SESSION['own_vendor_id']);
        $orders = get_orders_vendor_owner_by_time($Database,$_SESSION['own_vendor_id'],$time_start,$time_end);
        $data['revenue']  = 0;
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
            $data['revenue'] += $data['list_bill'][$order_id]['total'];
        }
        $data['header_hold'] = TRUE;
        $data['title'] = "Vendor Report";
        $data['number_bills'] = count($data['list_bill']);
        $this->load_header('header',$data);
        $this->view->load('static_slider',$data);
        $this->view->load('report_vendor_owner',$data);
        $this->view->load('footer',$data);
    }
}
