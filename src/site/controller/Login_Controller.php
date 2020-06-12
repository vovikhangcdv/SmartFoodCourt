<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Login_Controller extends Base_Controller {
    public function indexAction() {
        if ($this->auth->isLogin()) die(header('Location: index.php'));
        else if (isset($_POST['username']) and isset($_POST['password'])) {
            $message = $this->auth->login($_POST['username'], $_POST['password']);
            if ($this->auth->isLogin()) $this->success($message);
            else $this->fail($message);
        } else {
            $data = ['title' => 'Login', 'action' => '../index.php?c=login'];
            // $this->view->load('header',$data);
            $this->view->load('signin', array("title" => "Login", "action" => "../index.php?c=login"));
            // $this->view->load('footer',$data);
        }
    }
    private function fail($message = NULL) {
        $data = array('title' => 'Login', 'message' => $message, 'action' => '../index.php?c=login', 'return' => false);
        $this->view->load('header',$data);
        $this->view->load('login', $data);
        $this->view->load('footer',$data);
    }
    private function success($message = NULL) {
        $data = array('title' => 'Welcome Index', 'message' => $message, 'return' => true);
        die(header('Location: index.php'));
    }
}
