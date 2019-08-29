<?php


namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\ActivityCreateAction;

class ActivityController extends BaseController
{
    public function actions()
    {
        return [
            'create' => [
                'class' => 'app\controllers\actions\activity\ActivityCreateAction',
            ],
            'view' => [
                'class' => 'app\controllers\action\activity\ActivityViewAllPerDayAction',
            ],
        ];
    }
}