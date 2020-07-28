<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Payment_Controller extends Auth_Controller {
    public function resultAction() {
        // $this->config->load('debug_config');
        $this->library->load('Payment');
        $Payment = new Payment_Library();
        if ($Payment->result()){
            $this->load_header('header',$data);
            $this->view->load('slider',$data);
            $this->view->load('payment_success', $data);
            $this->view->load('footer',$data);
        }
        else{
            $this->load_header('header',$data);
            $this->view->load('slider',$data);
            $this->view->load('payment_failure', $data);
            $this->view->load('footer',$data);
        };
    }
}
