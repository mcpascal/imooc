<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 2017/10/24
 * Time: 21:44
 */

require_once(__DIR__.'/libs/db.php');
require_once(__DIR__.'/libs/User.php');
require_once(__DIR__.'/libs/Article.php');
//$user = new User($db);
$article = new Article($db);
//$data = $user -> register('admin','admin');
//$data = $user -> login('admin','admin');
//$data = $article -> create(1,'test','test');
var_dump($article->show(1));