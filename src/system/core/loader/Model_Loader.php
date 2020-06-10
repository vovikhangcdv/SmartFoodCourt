<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
/**
 * @package     MVC Framework
 * @author      Vo Vi Khang (DoubleVKay)
 * @email       khangvv1@viettel.com.vn
 * @copyright   Copyright (c) 2020
 * @since       Version 1.0
 * @filesource  system/core/loader/Help_Loader.php
 */
class Model_Loader
{
    /**
     * Load model
     * 
     * @param   string
     * @desc    hàm load model, tham số truyền vào là tên của model
     */
    public function load($model)
    {
        $model = ucfirst($model) . '_Model';
        require_once(PATH_APPLICATION . '/model/' . $model . '.php');
    }
}