<?php
/**
 * @var $model \app\models\Activity
 */

use yii\jui\DatePicker;
use \yii\bootstrap\ActiveForm;
?>

<div class="row">
    <div class="col-md-12">
        <h3>Новое событие (сегодня <?= date('d-m-Y') ?>)</h3>
    </div>
</div>
<?php $form = ActiveForm::begin();?>
<div class="row">
    <div class="col-md-12">
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'description')->textarea([
                'rows' => 4,
        ]) ?>
    </div>

</div>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'dateStart')->widget(DatePicker::class, [
                'dateFormat' => 'dd-MM-yyyy',
                'options' => [
                    'defaultDate' => 'date(\'dd-MM-yyyy\')',
                    'class' => 'form-control',

                ]
        ]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'dateEnd')->widget(DatePicker::class, [
                'dateFormat' => 'dd-MM-yyyy',
                'options' => [
                        'defaultDate' => 'date(\'dd-MM-yyyy\')',
                        'class' => 'form-control'
                    ]
        ]) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <?= $form->field($model, 'isRepeated')->checkbox() ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'repeatedType')->dropDownList($model::REPEATED_TYPE) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'isBlocked')->checkbox() ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <?= $form->field($model, 'useNotification')->checkbox() ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'email', ['enableAjaxValidation' => true, 'enableClientValidation' => false]) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'files[]')->fileInput(['multiple' => true]); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <button class="btn btn-default" type="submit">Создать</button>
    </div>
</div>

<?php ActiveForm::end();?>

