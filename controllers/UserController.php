<?php
/**
 * Created by PhpStorm.
 * User: LY
 * Date: 2016/5/3
 * Time: 16:18
 */

namespace app\controllers;


use app\business\UserBusiness;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionCreate()
    {
        $server = new UserBusiness();
        $request = \Yii::$app->request;
        $age = $request->get('age');
        $name = $request->get('name');
        $sex = $request->get('sex');
        $pwd = $request->get('pwd');
        $result = [
            'code' => 1,
            'message' => 'success'
        ];

        $server->saveUser($age, $name, $sex, $pwd);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}