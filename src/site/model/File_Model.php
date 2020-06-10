<?php 
function create_dir($target_dir){
    if (!file_exists($target_dir)) {
        if (!mkdir($target_dir, 0775, true)) {
        }
    }
}
function get_all_dir($dir){
    $output = array();
    if (file_exists($dir)){
        foreach(scandir($dir) as $file) {
            if (($file != '.') && ($file != '..')){
                if (is_dir($dir.$file)) $output[] = $dir.$file;
            }
        }
    }
    return $output;
}
function get_all_file($dir){
    $output = array();
    if (file_exists($dir)){
        foreach(scandir($dir) as $file) {
            if (($file != '.') && ($file != '..')){
                if (is_file($dir.$file)) $output[] = $dir.$file;
            }
        }
    }
    return $output;
}
function delete_file_by_id($dir,$id){
    $id = (string)$id;
    if (file_exists($dir)){
        foreach(scandir($dir) as $file) {
            if (($file != '.') && ($file != '..')){
                if (is_file($dir.$file) and (substr($file,0,strlen($id)) === $id)) unlink($dir.$file);
            }
        }
    }
}
function get_file_by_id($dir,$id){
    $id = (string)$id;
    if (file_exists($dir)){
        foreach(scandir($dir) as $file) {
            if (($file != '.') && ($file != '..')){
                if (is_file($dir.$file) and (substr($file,0,strlen($id)) === $id)) return($file);
            }
        }
    }
    return false;
}
?>