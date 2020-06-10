<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');
function checkvalidfileupload($file, $array_Allow_extention,$regex='/^([-\.\w]+)$/') {
    if (!(preg_match($regex, $file['name']) > 0)) return false;
    if ($file != NULL) {
        $file_name = basename($file["name"]);
        $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        // Check file size
        if ($file["size"] > 1000000) {
            return false;
        }
        //
        if($file['type'] != "image/gif") {    
            echo "Sorry, we only allow uploading GIF images";    
            return false;
        }
        // Allow certain file formats
        if (!in_array($imageFileType, $array_Allow_extention)) {
            return false;
        }
        return true;
    }
}
function getcontentfileupload($file, $array_Allow_extention) {
    if (!checkvalidfileupload($file, $array_Allow_extention)) {
        return false;
    } else return file_get_contents($file['tmp_name']);
}
function uploadfile($file,$basedir,$array_Allow_extention,$regex='/^([-\.\w]+)$/'){
    if (!checkvalidfileupload($file, $array_Allow_extention,$regex)) {
        return false;
    } else return move_uploaded_file($file["tmp_name"], $basedir.$file['name']);
}
?>