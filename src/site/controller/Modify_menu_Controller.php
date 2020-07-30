<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Modify_menu_Controller extends Auth_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->auth->isVendorOwner() and !$this->auth->isCook()){
            die(header('Location: /index.php?c=login'));
        }
    }
    public function indexAction($data=array()) {
        global $Database;
        $data['vendor'] = get_by_column($Database,'vendor','id',$_SESSION['own_vendor_id']);
        $data['title'] = "Modify Menu";
        $data['list_category'] = get_all_by_column($Database,'category_product','vendor_id',$_SESSION['own_vendor_id']);
        $data['list_product'] = get_all_by_column($Database,'product','vendor_id',$_SESSION['own_vendor_id']);
        $this->load_header('header',$data);
        $this->view->load('static_slider',$data);
        $this->view->load('modify_menu',$data);
        $this->view->load('footer',$data);
    }
    public function add_productAction(){
        global $Database;
        $this->model->load('Checker');
        $this->model->load('Uploadfile');
        $this->model->load('File');
        $this->model->load('Db');

        if (isset($_POST['product_name']) and isset($_POST['description']) and isset($_POST['price']) and isset($_FILES['file']) and isset($_POST['category_id'])){
            // Check category:
            $category_id = intval($_POST['category_id']);
            $price = intval($_POST['price']);
            if(!get_by_id($Database,'category_product',$category_id) or !check_valid_product_name($_POST['product_name']) or !($price > 0 and is_int($price))) {
                $data['message'] = 'Something was wrong! Please make sure that: <br> - Product name length must be between 3 to 20 <br> - Price must be positive integer';
                $data['return'] = false;
            }
            else {
                $vendor_dir = PATH_ROOT.'/public/spicyX/assets/img/product/';
                create_dir($vendor_dir);
                $product_id = get_next_id($Database,'product')['AUTO_INCREMENT'];
                $ext = pathinfo($_FILES["file"]["name"])['extension']; 
                $_FILES['file']['name'] = (string)$product_id.'.'.$ext;
                $photo = 'assets/img/product/'.$_FILES['file']['name'];
                insert_product($Database,$_POST['product_name'],$category_id,$_POST['description'],$price,$_SESSION['own_vendor_id'],$photo);
                if (!uploadfile($_FILES['file'],$vendor_dir,array('jpg','png', 'jpeg'),'/^([-\.\w\s]+)$/')){
                    delete_by_id($Database,'product',$product_id);
                    $data['message'] = 'Please upload file jpg, jpeg or png only';
                    $data['return'] = false;
                }
                else {
                    $data['message'] = 'Success';
                    $data['return'] = true;
                }
            }
        }
        $this->indexAction($data);
    }
    public function add_categoryAction(){
        global $Database;
        $this->model->load('Checker');
        $this->model->load('Db');

        if (isset($_POST['catname'])){
            // Check category:
            $category_name = strtoupper($_POST['catname']);
            if(!check_valid_product_name($category_name)) {
                $data['message'] = 'Something was wrong! Please make sure that: <br> - Category name length must be between 3 to 20';
                $data['return'] = false;
            }
            else {
                insert_category($Database,$category_name,$_SESSION['own_vendor_id']);
                $data['message'] = 'Success';
                $data['return'] = true;
            }
        }
        $this->indexAction($data);        
    }
    public function delete_categoryAction(){
        if (isset($_REQUEST['category_id'])){
            global $Database;
            $this->model->load('Db');
            $category_id = intval($_REQUEST['category_id']);
            $category = get_by_column($Database,'category_product','id',$category_id);
            if ($category['vendor_id'] === $_SESSION['own_vendor_id']){
                delete_by_id($Database,'category_product',$category_id);
            }
        }
        $this->indexAction();
    }
    public function switch_product_statusAction(){
        if (isset($_REQUEST['product_id'])){
            global $Database;
            $this->model->load('Db');
            $product_id = intval($_REQUEST['product_id']);
            $product = get_by_column($Database,'product','product_id',$product_id);
            if ($product['vendor_id'] === $_SESSION['own_vendor_id']){
                update_by_column($Database, 'product', 'is_ready', 1-$product['is_ready'],'product_id', $product_id);
            }
        }
    }
}
