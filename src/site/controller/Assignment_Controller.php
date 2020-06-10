<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Assignment_Controller extends Auth_Controller
{
    public function indexAction(){
        global $Database;
        $this->model->load('File');
        $this->model->load('Db');
        $data['title'] = 'Assignment';
        $data['list_assignment'] = get_all_assignment($Database);
        if ($data['list_assignment'] !== false){
            for ($i=0; $i < count($data['list_assignment']);$i++){
                $data['list_assignment'][$i]['creator'] = get_by_id($Database,'user',$data['list_assignment'][$i]['creator_id'])['fullname'];
                $data['list_assignment'][$i]['list_attachment'] = get_all_file($data['list_assignment'][$i]['path_folder']);
                $number_attachments = count($data['list_assignment'][$i]['list_attachment']);
                for ($j=0; $j< $number_attachments; $j++){
                    $data['list_assignment'][$i]['list_attachment'][$j] = str_replace(PATH_APPLICATION,'/site',$data['list_assignment'][$i]['list_attachment'][$j]);
                }
                $data['list_assignment'][$i]['list_submit'] =  get_all_file($data['list_assignment'][$i]['path_folder'].'submit/');
                $number_submits = count($data['list_assignment'][$i]['list_submit']);
                for ($j=0;$j < $number_submits;$j++){
                    $parser = explode('/',$data['list_assignment'][$i]['list_submit'][$j]);
                    $filename = $parser[count($parser)-1];
                    $id_user_submit = intval(explode('_',$filename)[0]);
                    $user_submit = get_by_id($Database,'user',$id_user_submit)['username'];
                    $path = '/site/'.'assignment/'.md5($data['list_assignment'][$i]['title']).'/submit/'.$filename;
                    $data['list_assignment'][$i]['list_submit'][$user_submit][] = $path;
                    unset($data['list_assignment'][$i]['list_submit'][$j]);
                }
            }
        }
        if ($this->auth->isStudent()) $data['title_upload']='Submit';
        else $data['title_upload']='Add file';
        $this->load_header('header',$data);
        $this->view->load('assignment',$data);
        $this->load_footer('footer',$data);

    }

    public function add_assignmentAction(){
        if (!$this->auth->isTeacher() and !$this->auth->isAdmin()) return $this->indexAction();
        global $Database;
        $this->model->load('Checker');
        $this->model->load('Uploadfile');
        $this->model->load('File');
        $this->model->load('Db');
        $data['title'] = 'Add Assigment';
        if (isset($_POST['title']) and isset($_POST['description']) and isset($_FILES['file'])){
            if (!isset($_POST['token']) or ($_POST['token']!==$_SESSION['token'])) die('Invalid token!');
            if (!check_assignment_title($_POST['title'])){
                $data['return'] = false;
                $data['message'] = 'Invalid title';
            }
            else {
                $assignment_dir = PATH_APPLICATION.'/assignment/'.md5($_POST['title']).'/';
                create_dir($assignment_dir);
                create_dir($assignment_dir.'submit/');
                if (!uploadfile($_FILES['file'],$assignment_dir,array('txt','pdf'),'/^([-\.\w\s]+)$/')){
                    $data['message'] = 'Please upload file txt,pdf only';
                    $data['return'] = false;
                }
                else {
                    insert_assignment($Database,$_SESSION['username'],$_POST['title'],$_POST['description'],$assignment_dir);
                    $data['message'] = 'Success. <a href="../index.php?c=assignment">See</a>';
                    $data['return'] = true;
                }
            }
        }
        $this->load_header('header',$data);
        $this->view->load('add_assignment',$data);
        $this->load_footer('footer',$data);

    }

    public function deleteAction() {
        if (!$this->auth->isTeacher() and !$this->auth->isAdmin()) return indexAction();
        global $Database;
        $this->model->load('Db');
        if (isset($_POST['id'])) {
            if (!isset($_POST['token']) or ($_POST['token']!==$_SESSION['token'])) die('Invalid token!');
            $assignment = get_by_id($Database,'assignment',intval($_POST['id']));
            system('rm -rf '.escapeshellarg($assignment['path_folder']));
            delete_by_id($Database,'assignment',intval($_POST['id']));
        }
        $this->indexAction();
    }

    public function uploadAction(){
        if (isset($_POST['id'])){
            global $Database;
            $this->model->load('Db');
            $this->model->load('Uploadfile');
            $assignment = get_by_id($Database,'assignment',intval($_POST['id']));
            if (isset($_FILES['file'])){
                if (!isset($_POST['token']) or ($_POST['token']!==$_SESSION['token'])) die('Invalid token!');
                $user = get_user($Database,$this->auth->username);
                if ($assignment !== false){
                    if ($user['role'] === 2){
                        $assignment_dir = $assignment['path_folder'].'submit/';
                        $_FILES['file']['name'] = (string)$user['id'].'_'.$_FILES['file']['name'];
    
                    }
                    else {
                        $assignment_dir = $assignment['path_folder'];
                    }
                    if (!uploadfile($_FILES['file'],$assignment_dir,array('txt','pdf'),'/^([-\.\w\s]+)$/')){
                        $data['message'] = 'Please upload file txt, pdf only';
                        $data['return'] = false;
                    }
                    else {
                        $data['message'] = 'Success.<a href="../index.php?c=assignment"> See</a>';
                        $data['return'] = true;
                    }
                }
            }
            $data['assignment_title'] = $assignment['title'];
            if ($this->auth->isStudent()){
                $data['title'] = 'Submission';
            }
            else {
                $data['title'] = 'Additional File';
            }
            $data['id'] = $_POST['id'];
            $this->load_header('header',$data);
            $this->view->load('upload_assignment',$data);
            $this->load_footer('footer',$data);
        }
        else $this->indexAction();
    }

}