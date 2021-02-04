<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\LinkPager;

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
            <p><?= $pagesCount ?></p>
            <p><?= $totalCount ?></p>
            <p><?= $n ?></p>
            <table class="table table-hover">
                <tbody>
                    <?php for ($i = 0; $i < $n; $i++): ?>
                        <tr>
                            <td class="align-middle"><a href="<?= Url::to(['attest/pdf', 'id' => $users[$i]->id]) ?>"><?= Html::img(Yii::getAlias('@web') . '/img/pdf_2186.png') ?></a></td>
                            <td class="align-middle"><?= $users[$i]->lastname ?></td>
                            <td class="align-middle"><?= $users[$i]->firstname ?></td>
                            <td class="align-middle"><?= $users[$i]->username ?></td>
                            <td class="align-middle"><a href="<?= Url::to(['attest/pdf', 'id' => $users[$i]->id]) ?>"><?= Html::img(Yii::getAlias('@web') . '/img/pdf_2186.png') ?></a></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
            <!-- <?= LinkPager::widget(['pagination' => $pagination]) ?> -->
        </div>
    </div>

</div>
</div>
