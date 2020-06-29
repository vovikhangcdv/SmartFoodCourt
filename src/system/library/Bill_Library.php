<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Bill_Library {
    public $orders = array();
    public $user;
    public $vendor;
    public $money;
    public $additional_money;
    public $timestamp_order;
    public $timestamp_finish;
    public $total;
    public function __construct()
    {
        require_once(PATH_APPLICATION . '/model/Db_Model.php');
    }
    public function generate_bill($Database,$user,$vendor,$timestamp_order,$timestamp_finish,$list_orders)
    {
        $id = 0;
        $this->vendor = $vendor;
        $this->user = $user;
        $this->timestamp_order = $timestamp_order;
        $this->timestamp_finish = $timestamp_finish;
        foreach ($list_orders as $product_id => $quantity) {
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
    public function generate_temp_bill($Database,$user,$vendor,$list_orders)
    {
        $id = 0;
        $this->vendor = $vendor;
        $this->user = $user;
        foreach ($list_orders as $product_id => $quantity) {
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
    public function get_timestamp_order() {
        return $this->timestamp_order;
    }
    public function get_timestamp_finish() {
        return $this->timestamp_finish;
    }
    public function get_user() {
        return $this->user;
    }
}