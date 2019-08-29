<?php

/* @var $this \yii\web\View */
/* @var $users  */
/* @var $activityUser  */
/* @var $act  */
/* @var $count  */
?>


<div class="row">

    <?php if ($this->beginCache('view1', ['duration' => 20])):?>
    <h3>----to cache----</h3>

        <div class="col-md-6">
        <pre>
            <?= print_r($users); ?>
        </pre>
        </div>

    <h3>--------------</h3>
<?php $this->endCache();endif; ?>

    <div class="col-md-6">
        <pre>
            <?= print_r($activityUser); ?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <?= print_r($act); ?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <?php echo($count); ?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <?php foreach($reader as $one): ?>
                <?= print_r($one);?>
            <?php endforeach;?>
        </pre>
    </div>
</div>