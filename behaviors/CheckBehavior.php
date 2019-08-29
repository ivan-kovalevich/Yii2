<?php


namespace app\behaviors;


use yii\base\Application;
use yii\base\Behavior;

class CheckBehavior extends Behavior
{
    public function events()
    {
        return [
            Application::EVENT_BEFORE_ACTION => 'checkAuthUser',
        ];
    }

    public function checkAuthUser()
    {

    }
}