<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Vendor_Controller extends Auth_Controller
{
    public function __construct() {
        parent::__construct();
        $this->authenticate_by_role(0);
    }
    public function indexAction($data=NULL){
        global $Database;
        $this->model->load('File');
        $this->model->load('Db');
        $data['title'] = 'Vendors';
        $data['list_vendor'] = get_all_by_tablename($Database,'vendor');
        $this->load_header('header_Admin',$data);
        $this->view->load('vendor_Admin',$data);
        $this->load_footer('footer_Admin',$data);

    }

    public function add_vendorAction(){
        global $Database;
        $this->model->load('Checker');
        $this->model->load('Uploadfile');
        $this->model->load('File');
        $this->model->load('Db');
        $data['title'] = 'Create New Vendor';
        if (isset($_POST['name']) and isset($_POST['description']) and isset($_FILES['file'])){
            if (!isset($_POST['token']) or ($_POST['token']!==$_SESSION['token'])) die('Invalid token!');
            $vendor_dir = PATH_ROOT.'/public/spicyX/assets/img/vendor/';
            create_dir($vendor_dir);
            $id_vendor = get_next_id($Database,'vendor')['AUTO_INCREMENT'];
            $ext = pathinfo($_FILES["file"]["name"])['extension']; 
            $_FILES['file']['name'] = (string)$id_vendor.'.'.$ext;
            $photo = 'assets/img/vendor/'.$_FILES['file']['name'];
            insert_vendor($Database,$_POST['name'],$_POST['description'],$photo);
            if (!uploadfile($_FILES['file'],$vendor_dir,array('jpg','png'),'/^([-\.\w\s]+)$/')){
                delete_by_id($Database,'vendor',$id_vendor);
                $data['message'] = 'Please upload file jpg or png only';
                $data['return'] = false;
            }
            else {
                $data['message'] = 'Success. <a href="'.PATH_INDEX.'?c=vendor">See</a>';
                $data['return'] = true;
            }
        }
        $this->load_header('header_Admin',$data);
        $this->view->load('add_vendor',$data);
        $this->load_footer('footer_Admin',$data);
    }

    public function deleteAction() {
        if (!$this->auth->isTeacher() and !$this->auth->isAdmin()) return indexAction();
        global $Database;
        $this->model->load('File');
        $this->model->load('Db');
        if (isset($_POST['id'])) {
            ## Check CSRF token
            if (!isset($_POST['token']) or ($_POST['token']!==$_SESSION['token'])) die('Invalid token!');
            ##
            $file_path = PATH_APPLICATION.'/challenge/'.$_POST['filename'];
            if(file_exists($file_path)) unlink($file_path);
            delete_by_id($Database,'challenge',intval($_POST['id']));
            delete_file_by_id(PATH_APPLICATION.'/challenge/',$_POST['id']);
        }
        $this->indexAction();
    }
    public function submitAction(){
        if (isset($_POST['answer']) and isset($_POST['id'])){
            $id = $_POST['id'];
            $answer = $_POST['answer'];
            $this->model->load('File');
            if ($filename = get_file_by_id(PATH_APPLICATION.'/challenge/',$id)){
                $true_answer = explode('.',substr($filename,strlen((string)$id)+1))[0];
                if ($answer === $true_answer){
                    $data['return'] = true;
                    $data['true_answer'] = $true_answer;
                    $data['message'] = 'Congratulations! Your answer is correct: '.$answer;
                }
                else {
                    $data['return'] = false;
                    $data['message'] = 'Wrong answer';
                }
            }
            $data['collapse_show_id'] = $id;
        }
        $this->indexAction($data);
    }
}