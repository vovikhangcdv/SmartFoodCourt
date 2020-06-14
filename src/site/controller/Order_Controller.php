<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Order_Controller extends Base_Controller
{
    private function is_set_vendor()
    {
        $vendor = $_SESSION['vendor'];
        if (isset($vendor) and $vendor !== NULL and $vendor !== false) return true;
        else return false;
    }
    private function is_empty_card()
    {
        return (!$this->is_set_vendor() or count($_SESSION['list_products']) === 0);
    }
    private function clean_up()
    {
        unset($_SESSION['vendor']);
        unset($_SESSION['list_products']);
    }
    public function indexAction()
    {
        // $this->config->load('debug_config');
        global $Database;
        $this->model->load('Db');
        $data['vendors'] = get_all_by_tablename($Database,'vendor');
        for ($i=0; $i < count($data['vendors']); $i++){
            $data['vendors'][$i]['products'] = get_all_by_column($Database,'product','vendor_id',$data['vendors'][$i]['id']);
        }
        // die(var_dump($data['vendors'][0]));
        $this->view->load('header',$data);
        // $this->view->load('slider',$data);
        $this->view->load('vendor_list',$data);
        $this->view->load('footer',$data);
    }
    public function cartAction()
    {
        # Show vendors
        if (!$this->is_set_vendor()) return $this->indexAction();
        // $this->config->load('debug_config');
        global $Database;
        $this->model->load('Db');
        $this->library->load('Order');
        $temp_order = new Order_Library();
        $temp_order->generate_temp_order($Database,$_SESSION['vendor'],$_SESSION['list_products']);
        $data['vendor'] = $temp_order->get_vendor();
        $data['orders'] = $temp_order->get_orders();
        $data['additional_money'] = $temp_order->get_additional_money();
        $data['total'] = $temp_order->get_total();
        // die(var_dump($data));

        $this->view->load('header',$data);
        $this->view->load('slider',$data);
        $this->view->load('cart',$data);
        $this->view->load('footer',$data);
    }

    public function set_vendorAction()
    {
        global $Database;
        $this->model->load('Db');
        // $this->config->load('debug_config');
        if (isset($_REQUEST['vendor_id'])) {
            $this->clean_up();
            $_SESSION['vendor'] = get_by_id($Database, 'vendor', intval($_REQUEST['vendor_id']));
        }
        if (!$this->is_set_vendor()) return $this->indexAction();
        else return $this->menuAction();
    }

    public function cancelAction(){
        $this->clean_up();
        $this->indexAction();
    }
    public function addAction()
    {
        if (!$this->is_set_vendor()) return $this->indexAction();
        global $Database;
        $this->model->load('Db');
        // $this->config->load('debug_config');
        if (isset($_REQUEST['product_id'])) {
            $product = get_by_column($Database, 'product', 'product_id', intval($_REQUEST['product_id']));
            if (isset($_REQUEST['quantity'])) $quantity = intval($_REQUEST['quantity']);
            else $quantity = 1;
            if ($product and $product['vendor_id'] === $_SESSION['vendor']['id'] and $product['is_ready'] === 1) $_SESSION['list_products'][$product['product_id']] = $quantity;
        }
        $this->cartAction();
    }

    public function removeAction()
    {
        if (!$this->is_set_vendor()) return $this->indexAction();
        unset($_SESSION['list_products'][intval($_REQUEST['product_id'])]);
    }

    public function menuAction()
    {
        if (!$this->is_set_vendor()) return $this->indexAction();
        global $Database;
        $this->model->load('Db');
        $data = array('title' => 'BK Smart Food Court');
        $list_vendor = get_all_by_tablename($Database, 'vendor');
        $number_vendor = count($list_vendor);
        for ($i = 0; $i < $number_vendor; $i++) {
            $data['list_vendor'][$list_vendor[$i]['id']]['categories'] = get_category_products_of_vendor($Database, $list_vendor[$i]['id']);
            $data['list_vendor'][$list_vendor[$i]['id']]['products'] = get_products_of_vendor($Database, $list_vendor[$i]['id']);
        }
        $data['vendor_id'] = $_SESSION['vendor']['id'];
        // var_dump($list_vendor);
        // die(var_dump($data));
        $this->view->load('header', $data);
        $this->view->load('slider', $data);
        $this->view->load('menu', $data);
        $this->view->load('footer', $data);
    }

    public function commit_Action()
    {
        if (!$this->auth->isLogin()) die(header('Location: index.php?c=login'));
        if ($this->is_empty_card()) return false;
        global $Database;
        $this->model->load('Db');
        $order_id = get_max_order_id($Database);
        if (!$order_id) die('Error');
        $new_order_id = $order_id + 1;
        foreach ($_SESSION['list_products'] as $product_id => $quantity) {
            if (get_by_column($Database, 'product', 'product_id', intval($product_id))['is_ready'] !== 0) insert_order($Database, $new_order_id, $_SESSION['vendor']['id'], get_user($Database, $_SESSION['username'])['id'], $product_id, $quantity, time());
        }
    }
}
