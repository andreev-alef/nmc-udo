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

        <!-- <p class="lead">Локальный сайт</p> -->

        <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>

    <div class="body-content">

        <div class="row">
            <?php $n = count($users) ?>
            <hr />
            <p><b>Всего учётных записей: <?= $n ?></b></p>
            <table class="table table-hover">
                <tbody>
                    <?php for ($i = 0; $i < $n; $i++): ?>
                        <tr>
                            <td class="align-middle"><?= $i ?></td>
                            <td class="align-middle"><?= $users[$i]->id ?></td>
                            <td class="align-middle">
                                <a href="<?= Url::to(['attest/user', 'id' => $users[$i]->id]) ?>" target="_self">
                                    <?= $users[$i]->lastname ?> <?= $users[$i]->firstname ?>
                                </a></td>
                            <td class="align-middle"><?= $users[$i]->username ?></td>
                            <td class="align-middle"><?= date("d.m.Y <b>(H:i)</b", $users[$i]->firstaccess) ?></td>
                            <td class="align-middle"><?= date("d.m.Y <b>(H:i)</b>", $users[$i]->lastaccess) ?></td>
                            <td class="align-middle"><?= $users[$i]->email ?></td>
                            <td class="align-middle"><a href="<?= Url::to(['attest/pdf', 'id' => $users[$i]->id]) ?>"><!-- <?= Html::img(Yii::getAlias('@web') . '/img/pdf_2186.png') ?> --></a></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>
