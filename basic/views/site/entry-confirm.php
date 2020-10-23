<?php

use yii\helpers\Html;
?>

<ul>
    <li><p>Имя <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>