<?php


namespace app\modules\auth\controllers;


use app\models\Users;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionSignUp()
    {
        $model = new Users();
        if(\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if (\Yii::$app->auth->signup($model)){
                $this->redirect(['sign-in']);
            }
        }

        return $this->render('signup', ['model' => $model]);
    }

    public function actionSignIn()
    {
        $model = new Users();
        if(\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if (\Yii::$app->auth->signin($model)){
                $this->redirect(['/activity-crud/index']);
            }
        }

        return $this->render('signin', ['model' => $model]);
    }

}