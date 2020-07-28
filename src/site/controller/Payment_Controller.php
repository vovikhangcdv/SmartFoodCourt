<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Payment_Controller extends Auth_Controller {
    public function resultAction() {
        // $this->config->load('debug_config');
        $this->library->load('Payment');
        $Payment = new Payment_Library();
        if ($Payment->result()){
            # Insert order to database
            global $Database;
            $this->model->load('Db');
            $this->config->load('debug_config');
            $order_id = get_max_order_id($Database);
            if ($order_id === false) die('Error');
            $new_order_id = $order_id + 1;
            foreach ($_SESSION['list_products'] as $product_id => $quantity) {
                if (get_by_column($Database, 'product', 'product_id', intval($product_id))['is_ready'] !== 0) insert_order($Database, $new_order_id, $_SESSION['vendor']['id'], get_user($Database, $_SESSION['username'])['id'], $product_id, $quantity, intval($_GET['requestId']),-1);
            }
            header("Location: ".PATH_INDEX.'?c=order&a=cancel&redirect='.(urlencode(PATH_INDEX.'?c=payment&a=success')));
        }
        else{
            $data['header_hold'] = TRUE;
            $this->load_header('header',$data);
            // $this->view->load('slider',$data);
            $this->view->load('payment_failure', $data);
            $this->view->load('footer',$data);
        };
    }
    public function successAction(){
        $data['title'] = 'Success';
        $data['header_hold'] = TRUE;
        $this->load_header('header',$data);
        $this->view->load('payment_success', $data);
        $this->view->load('footer',$data);
    }
}
