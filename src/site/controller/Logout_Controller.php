<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Logout_Controller extends Base_Controller {
    public function indexAction() {
        $this->auth->logout();
    }
}
