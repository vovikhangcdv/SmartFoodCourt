<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Admin_Controller extends Base_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->auth->isLogin() === False) {
            die(header('Location: /index.php?c=login'));
        }
    }
}
