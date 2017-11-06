<?php

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 2017/10/24
 * Time: 21:33
 */
require_once(__DIR__.'/ErrorCode.php');
class User
{
    private $_db;
    public function __construct($db){
        $this->_db = $db;
    }
    /**
     * 用户登陆认证
     * @param $username
     * @param $password
     * @throws Exception
     */
    public function login($username,$password){
        if(empty($username)){
            throw new Exception('用户名不能为空',ErrorCode::USERNAME_CANNOT_EMPTY);
        }
        if(empty($password)){
            throw new Exception('密码不能为空',ErrorCode::PASSWORD_CANNOT_EMPTY);
        }

        $password = $this->_encrypt($password);
        $sql = 'SELECT `username`,`id`,`created_at` FROM `user` WHERE username=:username and password=:password';
        $stmt = $this->_db->prepare($sql);
        $stmt -> bindParam(':username',$username);
        $stmt -> bindParam(':password',$password);
        $stmt -> execute();
        $user = $stmt -> fetch(PDO::FETCH_ASSOC);
        if(empty($user)){
            throw new Exception('用户名或密码错误',ErrorCode::USERNAME_OR_PASSWORD_WRONG);
        }
        return $user;
    }

    /**
     * 用户注册
     * @param $username
     * @param $password
     * @return mixed
     * @throws Exception
     */
    public function register($username, $password){
        if(empty($username)){
            throw new Exception('用户名不能为空',ErrorCode::USERNAME_CANNOT_EMPTY);
        }
        if(empty($password)){
            throw new Exception('密码不能为空',ErrorCode::PASSWORD_CANNOT_EMPTY);
        }
        if($this->_usernameExist($username)){
            throw new Exception('用户名已存在',ErrorCode::USERNAME_EXIST);
        }
        $password = $this->_encrypt($password);
        $created_at = time();
        $sql = 'INSERT INTO `user`(`username`,`password`,`created_at`) VALUES(:username,:password,:created_at)';
        $stmt = $this->_db->prepare($sql);
        $stmt -> bindParam(':username',$username);
        $stmt -> bindParam(':password',$password);
        $stmt -> bindParam(':created_at',$created_at);

        if($stmt -> execute()){
            $data['username'] = $username;
            $data['id'] = $this->_db -> lastInsertId();
            $data['created_at'] = $created_at;
            return $data;
        }else{
            throw new Exception('注册用户失败',ErrorCode::USER_REGISTER_ERROR);
        }
    }

    private function _usernameExist($username){
        $sql = 'SELECT `username` FROM `user` WHERE `username` = :username';
        $stmt = $this->_db->prepare($sql);
        $stmt -> bindParam(':username',$username);
        $stmt -> execute();
        $result = $stmt -> fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
            return true;
        }else{
            return false;
        }
    }

    private function _encrypt($password){
        $salt = 'imooc';
        return sha1(md5($salt.$password).$salt);
    }
}