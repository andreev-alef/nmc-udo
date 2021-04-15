<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Тестовая страница';
?>
<div class="body-content">
    <div class="row">
        <!-- <div class="col-lg-4"> -->

        <?php
        $form = ActiveForm::begin([
                    'id' => 'test',
                    'options' => ['class' => 'form-inline'],
        ]);
        ?>
        <?= $form->field($model, 'famil')->label("Фамилия") ?>
        <div class="form-group">
            <?= Html::submitButton("Найти", ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end() ?>
        <h2><?= $testTitle ?></h2>
        <h2><?= Html::encode($model->famil) ?></h2>
    </div>
</div>