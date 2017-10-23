<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 2017/10/17
 * Time: 22:05
 */
$string = ' Addfdf ';
echo trim($string);
echo ltrim($string);
echo rtrim($string);

$arr = array('1','dsfds');
echo implode(',',$arr);
echo join(',',$arr);