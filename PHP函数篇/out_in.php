<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 2017/10/26
 * Time: 19:51
 */

function out(){
    if(!function_exists('in')){
        function in(){
            echo "如果外部函数没有被调用，in函数不存在";
        }
    }
}
out();
in();

