<?php

/* @var $this \yii\web\View */
/* @var $users  */
/* @var $activityUser  */
/* @var $act  */
/* @var $count  */
?>

<div class="row">
    <div class="col-md-6">
        <pre>
            <?= print_r($users); ?>
        </pre>
    </div>
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