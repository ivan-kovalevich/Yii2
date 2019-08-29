<?php


namespace app\controllers;


use app\models\Users;
use yii\web\Controller;

class AuthController extends Controller
{

    public function actionSignIn()
    {
        $model = new Users();

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if (\Yii::$app->auth->signin($model)) {
                $this->redirect(['/activity/create']);
            }
        }

        return $this->render('signin', ['model' => $model]);
    }

    public function actionSignUp()
    {
        $model = new Users();

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if (\Yii::$app->auth->signup($model)) {
                $this->redirect(['/auth/sign-in']);
            }
        }

        return $this->render('signup', ['model' => $model]);
    }
}