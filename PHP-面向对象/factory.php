<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 2017/10/22
 * Time: 22:35
 */

class Memecache{
    public function set($k,$v){

    }

    public function get($k){
    }

    public function delete($k){

    }

}

class Cache{
    public static function factory(){
        return new Memcache();
    }
}
$cache = Cache::factory();