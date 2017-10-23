<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 2017/10/22
 * Time: 22:14
 */

trait A{
    public function a(){
        echo 'a';
    }
}

trait B{
    public function b(){
        echo 'b';
    }
}

class Test{
    use A,B;
    public function c(){
        echo $this->a();
    }
}