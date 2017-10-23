<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 2017/10/22
 * Time: 22:21
 */

interface Person{
    public function eat();
    public function sleep();
}

class Man implements Person{
    public function eat(){
        echo '肉食';
    }
    public function sleep(){
        echo '睡得很晚';
    }
}

class Woman implements Person{
    public function eat(){
        echo '喜欢吃素';
    }
    public function sleep(){
        echo '早点睡';
    }
}
class L{
    public static function factory(Person $user){
        return $user;
    }
}

$user = L::factory(new Man());
$user -> eat();
$user -> sleep();