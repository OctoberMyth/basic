<?php
/**
 * Created by PhpStorm.
 * User: LY
 * Date: 2016/5/3
 * Time: 16:18
 */

namespace app\controllers;


use app\business\UserBusiness;
use app\models\UserModel;
use yii\web\Controller;

class UserController extends Controller
{
    private $service;
    private $request;

    /**
     * 初始化参数
     */
    public function init()
    {
        parent::init();
        $this->service = new UserBusiness();
        $this->request = \Yii::$app->request;
    }


    /**
     * @return string
     * 创建用户
     */
    public function actionCreate()
    {
        $age = $this->request->get('age');
        $name = $this->request->get('name');
        $sex = $this->request->get('sex');
        $pwd = $this->request->get('pwd');
        $result = [
            'code' => 1,
            'message' => 'success'
        ];

        $this->service->saveUser($age, $name, $sex, $pwd);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return string
     * 删除用户
     */
    public function actionDel()
    {
        $result = [
            'code' => 1,
            'message' => 'success'
        ];
        $name = $this->request->get('name');
        $this->service->delUser($name);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return mixed
     * 通过id修改用户
     */
    public function actionUpdate()
    {
        $id = $this->request->get('id');
        $age = $this->request->get('age');
        $name = $this->request->get('name');
        $sex = $this->request->get('sex');
        $pwd = $this->request->get('pwd');

        $user = $this->service->queryUserById($id);
        var_dump($user['age']);
        $userBefore = $user;
        $userModel=new UserModel();
        $userModel->setId($id);
        $userModel->setAge(empty($age) == true ? $user['age'] : $age);
        $userModel->setName(empty($name) == true ? $user['name'] : $name);
        $userModel->setSex(empty($sex) == true ? $user['sex'] : $sex);
        $userModel->setPwd(empty($pwd) == true ? $user['pwd'] : $pwd);

        $this->service->updateUser($userModel);
        $userAfter=$this->service->queryUserById($id);
        $result = [
            'code' => 1,
            'message' => 'success',
            'data' => [
                'beforeUser'=>$userBefore,
                'afterUser'=>$userAfter
            ]
        ];
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /**
     * 通过id查询用户
     */
    public function actionQueryById()
    {
        $id = $this->request->get('id');
        $user = $this->service->queryUserById($id);
        if (empty($user)) {
            $result = [
                'code' => 1,
                'message' => 'failed'
            ];
        } else {
            $result = [
                'code' => 1,
                'data' => $user,
                'message' => 'success'
            ];
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /**
     * 查询所有的用户
     */
    public function actionQueryUser(){
        $users=$this->service->queryUser();
        if (empty($users)) {
            $result = [
                'code' => 1,
                'message' => 'failed'
            ];
        } else {
            $result = [
                'code' => 1,
                'data' => $users,
                'message' => 'success'
            ];
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}