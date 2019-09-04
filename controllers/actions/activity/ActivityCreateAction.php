<?php

namespace app\controllers\actions\activity;

use app\base\BaseAction;
use app\models\Activity;
use yii\web\Response;
use yii\bootstrap\ActiveForm;
use app\components\ActivityComponent;

class ActivityCreateAction extends BaseAction
{

    public function run()
    {
        /** @var Activity $model */
        //создаем экземпляр модели
        $model = \Yii::$app->activity->getModel();

        //если отправили форму, то загружаем данные с формы в модель
        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());

            //если наш запрос был Ajax
            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

           if (\Yii::$app->activity->createActivity($model)) {
               return $this->controller->render('submit', ['model' => $model]);
           }

        }
        return $this->controller->render('create', ['model' =>$model]);
    }
}