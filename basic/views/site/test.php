<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Тестовая страница';
?>
<div class="body-content">
    <div class="row">
        <!-- <div class="col-lg-4"> -->
        <h2>
            <?=$testTitle ?>
        </h2>
        <?php
            $form = ActiveForm::begin([
                        'id' => 'filter-form',
                        'options' => ['class' => 'form-inline'],
            ]);
            ?>
            <?= $form->field($model, 'famil')->label("Фамилия") ?>
            <div class="form-group">
                <?= Html::submitButton("Найти", ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end() ?>
        <h2><?= $fam ?></h2>
    </div>
</div>