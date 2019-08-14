<?php


namespace app\models;


use yii\base\Model;

class Day extends Model
{
    public $isHoliday;
    public $date;

    public function attributeLabels()
    {
        return [
            'isHoliday' => 'Выходной',
            'date' => 'Число'
        ];
    }
}