<?php



/* @var $this \yii\web\View */
/* @var $model \app\models\Users */

?>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <?php $form=\yii\bootstrap\ActiveForm::begin()?>
        <?=$form->field($model,'email')?>
        <?=$form->field($model,'password');?>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Регистрация</button>
        </div>
        <?php \yii\bootstrap\ActiveForm::end();?>
    </div>
    <div class="col-md-4"></div>
</div>
