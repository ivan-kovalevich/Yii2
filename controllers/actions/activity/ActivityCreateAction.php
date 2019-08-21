<?php

namespace app\controllers\actions\activity;

use app\base\BaseAction;
use app\models\Activity;
use yii\web\HttpException;
use yii\web\Response;
use yii\bootstrap\ActiveForm;

class ActivityCreateAction extends BaseAction
{

    public function run()
    {

        if(!\Yii::$app->rbac->canCreateActivity()){
            throw new HttpException(403,'Not Auth method');
        }

        //создаем экземпляр модели
        /** @var Activity $model */
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
               return $this->controller->redirect(['/activity/view','id'=>$model->id]);
           }
//           print_r($model->getErrors());exit;
        }
        return $this->controller->render('create', ['model' =>$model]);
    }
}