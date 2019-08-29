<?php

/* @var $this yii\web\View */

$this->title = 'My Calendar';

use yii\helpers\Html;

?>
<div class="site-index">

    <div class="jumbotron">

        <p class="lead">Сегодня <?= date('d-m-Y') ?></p>
        <p class="lead">Здравствуйте, гость!
            <?= Html::a(' Залогиньтесь ', ['/auth/user/sign-in']) ?>
            чтобы управлять своими событиями </p>

    </div>
</div>
