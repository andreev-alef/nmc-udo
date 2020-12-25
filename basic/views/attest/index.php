<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'НМЦ';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Аттестация руководителей</h2>

        <!-- <p class="lead">Локальный сайт</p> -->

        <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>

    <div class="body-content">

        <div class="row">
            <?php $n = count($users) ?>
            <?php for ($i = 0; $i < $n; $i++): ?>
                <p><?= $users[$i]->id ?> <?= $users[$i]->lastname ?> <?= $users[$i]->firstname ?></p>
            <?php endfor ?>
        </div>        
    </div>

</div>
</div>
