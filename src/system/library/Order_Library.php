<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Order_Library {
    public $orders = array();
    public $vendor;
    public $money;
    public $additional_money;
    public $total;
    public function __construct()
    {
        require_once(PATH_APPLICATION . '/model/Db_Model.php');
    }
    public function generate_order($Database,$order_id,$orders)
    {
        // $this->vendor = $orders
        // $id = 1;
        foreach ($this->orders as $id => $order) {
            $product = get_by_id($Database,'product',$order['product_id']);
            $this->orders[$id]['product_id'] = $product['product_id'];
            $this->orders[$id]['product_name'] = $product['product_name'];
            $this->orders[$id]['money'] = $product['price']*$order['quantity'];
            $this->money += $this->orders[$id]['money'];
            $id++;
        }
        $this->additional_money = $this->money*0.10;
        $this->total = $this->money + $this->additional_money;
        $this->total = round($this->total,-3);
    }
    public function generate_temp_order($Database,$vendor,$list_products)
    {
        $id = 0;
        $this->vendor = $vendor;
        foreach ($list_products as $product_id => $quantity) {
            $product = get_by_column($Database, 'product', 'product_id', intval($product_id));
            $this->orders[$id]['product'] = $product;
            $this->orders[$id]['quantity'] = $quantity;
            $this->orders[$id]['money'] = $product['price']*$quantity;
            $this->money += $this->orders[$id]['money'];
            $id++;
        }
        $this->additional_money = $this->money*0.10;
        $this->total = $this->money + $this->additional_money;
        $this->total = round($this->total,-3);
    }
    public function get_vendor(){
        return $this->vendor;
    }
    public function get_orders(){
        return $this->orders;
    }
    public function get_total(){
        return $this->total;
    }
    public function get_additional_money() {
        return $this->additional_money;
    }
}