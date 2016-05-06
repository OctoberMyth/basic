<?php
/**
 * Created by PhpStorm.
 * User: LY
 * Date: 2016/5/4
 * Time: 10:48
 */

namespace app\dao;


use app\models\User;

class UserDao
{

    /**
     * @param $user
     * 把用户保存到数据库
     */
    public function saveUser($user)
    {
        $sql = "insert INTO user(age,userName,pwd,sex,createTime) VALUES(:age,:name_,:pwd,:sex,CURRENT_TIME());";
        return \Yii::$app->getDb()
            ->createCommand($sql)
            ->bindValue(":age", $user->getAge())
            ->bindValue(":name_", $user->getName())
            ->bindValue(":pwd", $user->getPwd())
            ->bindValue(":sex", $user->getSex())
            ->execute();
    }

    /**
     * @param $name
     * 删除用户
     */
    public function delUser($name)
    {
        $sql = "DELETE from `user`  WHERE userName = :name_";
        return \Yii::$app->getDb()
            ->createCommand($sql)
            ->bindValue(":name_", $name)
            ->execute();

    }

    /**
     * @param $user
     * 修改用户
     */
    public function updateUser($user)
    {
        $sql = "UPDATE  `user` set userName=:userName,pwd=:pwd,age=:age,createTime=CURRENT_TIME() WHERE id=:id";
        return \Yii::$app->getDb()
            ->createCommand($sql)
            ->bindValue(":userName", $user->getName())
            ->bindValue(":pwd", $user->getPwd())
            ->bindValue(":age", $user->getAge())
            ->bindValue(":id", $user->getId())
            ->execute();
    }

    /**
     * @param $id
     * 通过用户id查询用户
     */
    public function queryByUserId($id)
    {
        $sql = "SELECT u.id,u.userName,u.pwd,u.age,u.createTime from `user` u WHERE u.id=:id";
        return \Yii::$app->getDb()
            ->createCommand($sql)
            ->bindValue(":id", $id)
            ->queryOne();
    }

    /**
     * @return \yii\db\DataReader
     * 查询用户
     */
    public function queryUser(){
        $sql="SELECT u.id,u.userName,u.pwd,u.age,u.createTime from `user` u";
        return \Yii::$app->getDb()
            ->createCommand($sql)
            ->queryAll();
    }
}