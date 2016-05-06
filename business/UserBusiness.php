<?php
/**
 * Created by PhpStorm.
 * User: LY
 * Date: 2016/5/4
 * Time: 10:38
 */

namespace app\business;


use app\dao\UserDao;
use app\models\UserModel;

class UserBusiness
{
    private $dao;
    /**
     * UserBusiness constructor.
     */
    public function __construct()
    {
       $this->dao=new UserDao();
    }

    /**
     * 创建一个新的用户
     */
    public function saveUser($age,$name,$sex,$pwd){
        $model=new UserModel();
        $model->setAge($age);
        $model->setPwd($pwd);
        $model->setName($name);
        $model->setSex($sex);
        $model->setCreateTime("date(Y-m-d H:i:s");
        $this->dao->saveUser($model);
    }

    /**
     * @param $name
     * 通过用户姓名删除用户
     */
    public function delUser($name){

        $this->dao->delUser($name);
    }

    /**
     * @param $user
     * 修改用户
     */
    public function updateUser($user){
        $this->dao->updateUser($user);
    }

    /**
     * @param $id
     * 通过id查询用户
     */
    public function queryUserById($id){
        return $this->dao->queryByUserId($id);
    }

    /**
     * 查询用户
     */
    public function queryUser(){
        return $this->dao->queryUser();
    }
}