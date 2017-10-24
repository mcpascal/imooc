<?php

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 2017/10/24
 * Time: 22:59
 */
require_once(__DIR__.'/ErrorCode.php');
class Article
{
    private $_db;
    public function __construct($db){
        $this->_db = $db;
    }
    public function list($page,$pageSize){

    }
    public function create($userId,$title,$content=''){
        if(empty($userId)){
            throw new Exception('文章作者不能为空',ErrorCode::ARTICLE_USER_CANNOT_EMPTY);
        }
        if(empty($title)){
            throw new Exception('文章题目不能为空',ErrorCode::ARTICLE_TITLE_CANNOT_EMPTY);
        }
        $createdAt = time();
        $sql = 'INSERT INTO `article`(`user_id`,`title`,`content`,`created_at`) VALUES(:userId,:title,:content,:createdAt)';
        $stmt = $this->_db->prepare($sql);
        $stmt -> bindParam(':userId',$userId);
        $stmt -> bindParam(':title',$title);
        $stmt -> bindParam(':content',$content);
        $stmt -> bindParam(':createdAt',$createdAt);
        if($stmt -> execute()){
            $data['title'] = $title;
            $data['content'] = $content;
            $data['userId'] = $userId;
            $data['createdAt'] = $createdAt;
            $data['articleId'] = $this ->_db ->lastInsertId();
            return $data;
        }else{
            throw new Exception('文章创建失败',ErrorCode::ARTICLE_CREATE_FAILURE);
        }
    }
    public function show($id){
        $sql = 'SELECT `id`,`user_id`,`title`,`content` FROM `article` WHERE `id` = :id';
        $stmt = $this->_db->prepare($sql);
        $stmt -> bindParam(':id',$id);
        $stmt -> execute();
        $result = $stmt -> fetch(PDO::FETCH_ASSOC);
        if(empty($result)){
            throw new Exception('没有文章信息',ErrorCode::ARTICLE_NOT_EXIST);
        }
        return $result;

    }
    public function delete(){

    }
    public function update(){

    }
}