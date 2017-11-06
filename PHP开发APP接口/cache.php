<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 2017/11/5
 * Time: 18:22
 */

/**
 * 文件缓存
 */

class File{
    private $_dir;
    const EXCETION = '.txt';

    public function __construct(){
        $this->_dir = dirname(__FILE__);
    }
    public function cache($key, $value='', $path=''){
        $filename = $this->_dir.$path.$key.self::EXCETION;
        if($value !== ''){
            if(is_null($value)){
                return unlink($filename);
            }
            $dir = basename($filename);
            if(!is_dir($dir)){
                mkdir($dir,'0777');
            }
            return file_put_contents($filename, json_encode($value));
        }
        if(is_file($filename)){
            return json_decode(file_get_contents($filename));
        }else{
            return false;
        }
    }
}