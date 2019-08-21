<?php


namespase app\controllers\actions;


use yii\base\Action;

class ActivityCreateAction extends Action
{
	public function run()
	{
		$model=new Activity();
		
		if(\Yii::$app->request->isPost){
			$model->load(\Yii::$app->request->post());
			// print_r($model->getAttributes());
			// exit;
		}
		
		return $this->controller->render('create',['model'=>$model]);
	}
}