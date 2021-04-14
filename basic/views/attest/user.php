<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
$this->title = 'НМЦ';
date_default_timezone_set("Asia/Novokuznetsk");
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Аттестация руководителей</h2>
        <h3><?= $user->lastname?> <?= $user->firstname?></h3>

        <!-- <p class="lead">Локальный сайт</p> -->

        <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>

    <div class="body-content">

        <div class="row">
            <p><?= $user->lastaccess ?></p>
            <p><?= date("d.m.Y H:i:s", $user->firstaccess) ?></p>
            <p><?= date("d.m.Y H:i:s", $user->lastaccess) ?></p>
            <p><?= $user->id ?></p>
            <p><?= var_dump($user)?></p>
        </div>
    </div>

</div>
</div>
