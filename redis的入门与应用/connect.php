<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 2017/10/17
 * Time: 17:12
 */
$host = '45.77.177.70';
$port = '6379';
$redis = new \Redis();
$redis -> connect($host,$port);

$redis -> delete('string1');
$redis -> set('string1','val1');
$val = $redis -> get('string1');
var_dump($val);

$redis->set('string1',5);
$redis -> incr('string1');
$redis ->decr('string1',2);
echo $redis -> get('string1');