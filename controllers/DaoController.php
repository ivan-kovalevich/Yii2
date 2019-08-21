<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\DaoComponent;

class DaoController extends BaseController
{
    /**
     * @return string
     *
     */
    public function actionTest()
    {

        /** @var DaoComponent $dao */
        if (!empty(\Yii::$app->dao)) {
            $dao = \Yii::$app->dao;
        }
        $dao->updates();
        $users = $dao->getUsers();
        $activityUser = $dao->getActivityUser(\Yii::$app->request->get('user'));
        $activity = $dao->getActivityAny();
        $count = $dao->getCountActivity();
        $reader = $dao->getReaderActivity();
        return $this->render('dao', [
            'users' => $users,
            'activityUser' => $activityUser,
            'act' => $activity,
            'count' => $count,
            'reader' => $reader
        ]);
    }
}