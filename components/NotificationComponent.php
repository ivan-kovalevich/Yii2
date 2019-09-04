<?php


namespace app\components;


use app\models\Activity;
use yii\base\Component;
use yii\mail\MailerInterface;
use yii\console\Application;

class NotificationComponent extends Component
{
    /**  @var MailerInterface*/
    private $mailer;

    public function __construct()
    {
        $this->mailer = \Yii::$app->mailer;
    }
    /** @param $activities Activity[]*/
    public function sendNotifications(array $activities)
    {
        foreach ($activities as $activity) {
            if ($this->mailer->compose('notification', ['model' => $activity])
                ->setFrom('rodion.kudryavtsev@mail.ru')
                ->setSubject('Событие стартует сегодня')
                ->setTo($activity->email)
                ->send())
            {
                if (\Yii::$app instanceof Application) {
                    echo 'Success for email '.$activity->email.PHP_EOL;
                }
            } else {
                if (\Yii::$app instanceof Application) {
                    echo 'Error for email '.$activity->email.PHP_EOL;
                }
            }
        }
    }
}