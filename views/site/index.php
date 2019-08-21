<?php

/* @var $this yii\web\View */

$this->title = 'My Calendar';

use yii\helpers\Html;

?>
<div class="site-index">

    <div class="jumbotron">

        <p class="lead">Сегодня <?= date('d-m-Y') ?></p>
        <p class="lead">По-идее здесь будут события на сегодня</p>
        <?= Html::a('Создать/редактировать событие', ['/activity/create'], ['class'=>'btn btn-default']) ?>
    </div>
</div>
