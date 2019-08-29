<?php

use app\models\Activity;
/**
 * @var $model Activity
 */
?>

<h2>Активность стартует сегодня </h2>
<h3 style="color: green;"><?=$model->title?></h3>
<p><?=$model->description;?></p>
