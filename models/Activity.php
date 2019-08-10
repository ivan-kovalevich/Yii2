<?php


namespase app\models;


use yii\base\Model;

class Activity extends Model
{
	public $title;
	public $description;
	public $dateStart;
	public $isBlocked;
	
	public function rules()
	{
		return [
			['title','required'],
			['description','string','min' => 5],
			['dateStart','string'],
			['isBlocked','boolean']
		];
	}
}