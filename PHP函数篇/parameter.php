<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 2017/10/26
 * Time: 19:53
 */
function demo(...$name){
    $sum = 0;
    if(!$name){
        return $sum;
    }else{
        foreach($name as $item){
            $sum += $item;
        }
        return $sum;
    }
}

echo demo(1,2,3);