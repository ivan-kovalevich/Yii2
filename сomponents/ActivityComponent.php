<?php


namespace app\сomponents;


use yii\base\Component;

class ActivityComponent extends Component
{
    public function getAllActivitiesArray(){
        $sql='select * from activity';

        return \Yii::$app->db->createCommand($sql)->queryAll();
    }
}