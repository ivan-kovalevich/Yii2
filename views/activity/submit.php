<?php
/**
 * @var $model \app\models\Activity
 */
?>

<div class="row">
    <div class="col-md-12">
        <h3>События на <?= \Yii::$app->formatter->asDate($model->dateStart, 'php:d-m-Y') ?></h3>
    </div>
    <div class="col-md-12">
        <h5><?=$model->title?></h5>
    </div>
    <div class="col-md-12">
        <?=$model->description?>
    </div>
</div>
<?php if ($model->files): ?>
<div class="row">
    <?php foreach ($model->files as $file): ?>
        <div class="col-md-3">
            <img src="/images/<?=$file;?>">
        </div>
    <?php endforeach ?>
</div>
<?php endif;?>