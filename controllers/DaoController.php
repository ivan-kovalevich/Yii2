<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\DaoComponent;
use yii\filters\PageCache;


class DaoController extends BaseController
{
    public function behaviors()
    {
        return [
            ['class' => PageCache::class,
                'only' => ['test'],
                'duration' => 10
            ]
        ];
    }


    /** @return string */

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

    //пример работы с кешем
    public function actionCacheExample()
    {
        $val = 'value1';
        \Yii::$app->cache->set('key1', $val);
        $val = 'value3';
        $val=\Yii::$app->cache->get('key1');
        $val2=\Yii::$app->cache->getOrSet('key2',function (){
            return 'value2';
        });
        echo $val2.PHP_EOL;
        echo $val;
    }
}