<?php

namespace app\components;

use app\base\BaseComponent;
use app\models\Activity;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;


class ActivityComponent extends BaseComponent
{
    public $classModel;

    public function getModel()
    {
        return new $this->classModel();
    }

    public function createActivity(Activity &$activity): bool
    {
        $activity->files = UploadedFile::getInstances($activity, 'files');
        $activity->user_id = \Yii::$app->user->getId();

        if (!$activity->save()) {
            return false;
        }

        if ($activity->files) {
            foreach ($activity->files as $file) {
                $this->saveUploadedFile($file);
                //TODO Сохранить имена изображений, чтобы их показывать в 'submit'
            }
        }

        return true;
    }

    private function saveUploadedFile(UploadedFile $uploadedFile) : ?string
    {
        $filename = $this->generateFileName($uploadedFile);
        $path = $this->getSavePath();
        if ($uploadedFile->saveAs($path.$filename)) {
            return $filename;
        } else {
            return null;
        }
    }

    private function generateFileName(UploadedFile $uploadedFile) : string
    {
        return \Yii::$app->getSecurity()->generateRandomString(15).'.'.$uploadedFile->extension;
    }

    private function getSavePath() : string
    {
        FileHelper::createDirectory(\Yii::getAlias('@webroot').'/images', 0777);
        return \Yii::getAlias('@webroot').'/images/';
    }

    public function getTodayNotifications(): ?array
    {
        return Activity::find()->andWhere(['dateStart' => date('Y-m-d')])
            ->andWhere(['useNotification' => 1])
            ->andWhere('email is not null')->all();
    }
}