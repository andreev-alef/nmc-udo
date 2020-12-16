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
            <!-- <div class="col-lg-4"> 
            <h2>
                База удостоверений
            </h2> -->
            <?php
            $form = ActiveForm::begin([
                        'id' => 'filter-form',
                        'options' => ['class' => 'form-inline'],
            ]);
            ?>
            <?= $form->field($filterModel, 'famil')->label("Фамилия") ?>
            <?= $form->field($filterModel, 'gos_nomer')->label("Госномер") ?>
            <?= $form->field($filterModel, 'reg_nomer')->label("Регистрационный номер") ?>
            <div class="form-group">
                <?= Html::submitButton("Найти", ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end() ?>
            <!--
            <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            -->
        </div>        
    </div>

</div>
</div>
