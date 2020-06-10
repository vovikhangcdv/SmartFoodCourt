<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
class Download_Controller extends Auth_Controller {
    public function indexAction() {
        die('Invalid param');
    }
    public function challengeAction(){
        $this->model->load('File');
        if (isset($_GET['id'])){
            $challenge_dir = PATH_APPLICATION.'/challenge/';
            $filename = get_file_by_id($challenge_dir,$_GET['id']);
            if ($filename !== false){
                $this->download($challenge_dir.$filename,md5($filename).'.txt');
            }
        }
    }
    private function download($path,$filename){
        if (file_exists($path)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filename).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($path));
            readfile($path);
            exit;
        }
        else die('File not found');
    }
}
