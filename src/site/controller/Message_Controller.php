<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Message_Controller extends Auth_Controller
{
    public function indexAction()
    {
        global $Database;
        $this->model->load('Db');
        $data['title'] = 'Messenger';
        $current_user = get_user($Database,$this->auth->username);
        if (isset($_GET['id']) and get_by_id($Database,'user',intval($_GET['id']))) {
            $chose_user = get_by_id($Database,'user',intval($_GET['id']));
            check_message($Database,$chose_user['id'],$current_user['id']);
        }
        $all_user = get_all_by_tablename($Database,'user');
        foreach($all_user as $user){
            if ($user['id'] === $current_user['id']) continue;
            $list[$user['id']]['fullname'] = $user['fullname'];
            $list[$user['id']]['message'] = get_messages_of_2_user($Database,$current_user['id'],$user['id']);
        }
        $data['list'] = $list;
        $data['current_user'] = $current_user;
        $data['chose_user'] = $chose_user;
        // var_dump($list);
        $this->load_header('header',$data);
        $this->view->load('message',$data);
        $this->load_footer('footer',$data);
    }
    public function sendAction(){
        if (isset($_POST['receiver_id']) and isset($_POST['message'])){
            if (!isset($_POST['token']) or ($_POST['token']!==$_SESSION['token'])) die('Invalid token!');
            global $Database;
            $this->model->load('Db');
            $sender_id = get_user($Database,$this->auth->username)['id'];
            $receiver_id = get_user_by_id($Database,intval($_POST['receiver_id']));
            if ($receiver_id !== false) insert_message($Database,$sender_id,intval($_POST['receiver_id']),$_POST['message'],time());
        }
        $this->indexAction();
    }
}