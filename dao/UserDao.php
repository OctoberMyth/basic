<?php
/**
 * Created by PhpStorm.
 * User: LY
 * Date: 2016/5/4
 * Time: 10:48
 */

namespace app\dao;


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
            ->bindValue(":age",$user->getAge())
            ->bindValue(":name_",$user->getName())
            ->bindValue(":pwd",$user->getPwd())
            ->bindValue(":sex",$user->getSex())
            ->execute();
    }
}