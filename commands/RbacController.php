<?php


namespace app\commands;


use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit(){
        \Yii::$app->rbac->initRbacRules();
    }
}