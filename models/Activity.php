<?php


namespace app\models;


use app\models\rules\DateValidation;
use yii\base\Model;

class Activity extends ActivityBase
{
    public $files;
    public $repeatedType;

    public const REPEATED_TYPE = [
        1 => 'Ежедневно',
        2 => 'Еженедельно',
        3 => 'Ежемесячно',
    ];

    public function beforeValidate()
    {
        $dateStart = \DateTime::createFromFormat('d-m-Y', $this->dateStart);
        if ($dateStart) {
            $this->dateStart = $dateStart->format('Y-m-d');
        }
        $dateEnd = \DateTime::createFromFormat('d-m-Y', $this->dateEnd);
        if ($dateEnd) {
            $this->dateEnd = $dateEnd->format('Y-m-d');
        }

        return parent::beforeValidate();
    }

    public function rules()
    {
        return array_merge([
            ['title', 'trim'],
            [['title', 'dateStart', 'dateEnd'],'required'],
            ['description', 'string', 'min' => 5, 'max' => 150],
            [['dateStart', 'dateEnd'], 'date', 'format' => 'php:Y-m-d'],
            ['dateEnd', 'compare', 'compareAttribute' => 'dateStart',
                'operator' => '>=',
                'message' => 'Событие должно заканчиваться не раньше его начала'
            ],
            ['repeatedType','in', 'range' => array_keys(self::REPEATED_TYPE)],
            [['isBlocked','useNotification','isRepeated'], 'boolean'],
            ['files', 'file', 'extensions' => ['jpg', 'jpeg', 'png'], 'maxFiles' => 10],
            ['email', 'email'],
            ['email', 'required', 'when' => function(){
                return $this->useNotification ? true : false;
            } ],

        ], parent::rules());
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'description' => 'Описание',
            'dateStart' => 'Начало',
            'dateEnd' => 'Окончание',
            'isBlocked' => 'Это одно событие на целый день',
            'isRepeated' => 'Повторяющееся событие',
            'repeatedType' => 'Повторять',
            'useNotification' => 'Уведомление',
            'email' => 'E-mail',
            'files' => 'Прикрепить файлы',
            'user_id' => 'Автор',
        ];
    }
}