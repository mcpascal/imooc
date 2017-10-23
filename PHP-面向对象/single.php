<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 2017/10/22
 * Time: 22:32
 */
class Person{
    public static $_instance;
    private function __construct()
    {
    }
    private function __clone(){

    }
    public function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}