<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 2017/10/21
 * Time: 14:07
 */

class Computer{
    protected $memory = 8096;
    private $cpu = 'amd ryzn 1600x';
    public $mainBoard = '华擎z370x';
    private $hd = 512;

    public function game($gameName = '')
    {
        if($this->getHd() < 1024){
            echo '硬盘空间不足';
            return false;
        }
        return true;
    }

    public function job($job = '')
    {
        return $this->game();
    }

    private function getHd(){
        return $this->hd;
    }
}
//实例
$computer = new Computer();
//var_dump($computer);
$computer -> job();