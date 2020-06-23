<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Vendor_Controller extends Auth_Controller
{
    public function indexAction($data=NULL){
        global $Database;
        $this->model->load('File');
        $this->model->load('Db');
        $data['title'] = 'Vendors';
        $data['list_vendor'] = get_all_by_tablename($Database,'vendor');
        $this->load_header('header_Admin',$data);
        $this->view->load('vendor',$data);
        $this->load_footer('footer_Admin',$data);

    }

    public function add_challengeAction(){
        if (!$this->auth->isTeacher() and !$this->auth->isAdmin()) return indexAction();
        global $Database;
        $this->model->load('Checker');
        $this->model->load('Uploadfile');
        $this->model->load('File');
        $this->model->load('Db');
        $data['title'] = 'Create Challenge';
        if (isset($_POST['title']) and isset($_POST['description']) and isset($_FILES['file'])){
            if (!isset($_POST['token']) or ($_POST['token']!==$_SESSION['token'])) die('Invalid token!');
            $challenge_dir = PATH_APPLICATION.'/challenge/';
            create_dir($challenge_dir);
            insert_challenge($Database,$_SESSION['username'],$_POST['title'],$_POST['description']);
            $id_challenge = get_max_id_of_table($Database,'challenge')['max'];
            $_FILES['file']['name'] = (string)$id_challenge.'_'.$_FILES['file']['name'];
            if (!uploadfile($_FILES['file'],$challenge_dir,array('txt','pdf'),'/^([-\.\w\s]+)$/')){
                delete_by_id($Database,'challenge',$id_challenge);
                $data['message'] = 'Please upload file txt,pdf only';
                $data['return'] = false;
            }
            else {
                $data['message'] = 'Success. <a href="../index.php?c=challenge">See</a>';
                $data['return'] = true;
            }
        }
        $this->load_header('header',$data);
        $this->view->load('add_challenge',$data);
        $this->load_footer('footer',$data);
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