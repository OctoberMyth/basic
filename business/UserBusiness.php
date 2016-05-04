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
}