<?php
/**
 * Created by PhpStorm.
 * User: LY
 * Date: 2016/4/14
 * Time: 11:41
 */

namespace app\controllers;


use yii\web\Controller;

class SayController extends Controller
{

    public function actionHello(){
        return $this->render('hello');
    }
}