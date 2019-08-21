<?php


namespace app\controllers\actions\site;


use app\base\BaseAction;

class SiteAboutAction extends BaseAction
{
    public function run()
    {
        return $this->controller->render('about');
    }
}