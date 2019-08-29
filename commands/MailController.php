<?php


namespace app\commands;


use app\components\NotificationComponent;
use yii\console\Controller;

class MailController extends Controller
{
    public function actionNotification()
    {
        $activities = \Yii::$app->activity->getTodayNotifications();
        //echo count($activities).PHP_EOL;

        /** @var NotificationComponent $notif */
        $notif = \Yii::createObject(['class' => NotificationComponent::class]);
        $notif->sendNotifications($activities);
    }

}