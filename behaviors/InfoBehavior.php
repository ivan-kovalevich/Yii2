<?php


namespace app\behaviors;


use yii\base\Behavior;

class InfoBehavior extends Behavior
{
    public function events()
    {
        return [
            \Yii::$app->params['EVENT_STATUS']=>'log'
        ];
    }

    public function log()
    {
        \Yii::error('change status completed');
    }
}