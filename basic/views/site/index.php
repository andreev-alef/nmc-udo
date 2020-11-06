<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'НМЦ';
?>
<div class="site-index">

    <!--    <div class="jumbotron">
            <h1>Научно-методический центр</h1>
    
            <p class="lead">Локальный сайт</p>
    
            <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
        </div>
    -->
    <div class="body-content">

        <div class="row">
            <!-- <div class="col-lg-4"> -->
            <h2>
                База удостоверений
            </h2>
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
            <?php if($data[0] === Null): ?>
            <p style="font-size: 14pt; color: #ff0000;">
                Ничего не найдено
            </p>
            <?php else: ?>
            <p style="font-size: 14pt;">
                Всего записей: <b><?= count($data) ?></b>
            </p>
            <?php endif?>
            <table class="table table-hover">
                <tbody>
                    <?php $n = count($data); ?>
                    <?php for ($i = $n-1; $i >= 0; $i--): ?>
                        <tr>
                            <td class="align-middle"><?= $data[$i][4] ?></td>
                            <td class="align-middle"><?= $data[$i][5] ?></td>
                            <td class="align-middle"><?= $data[$i][6] ?></td>
                            <td class="align-middle"><?= $data[$i][8] ?></td>
                            <td class="align-middle"><?= $data[$i][9] ?></td>
                            <td class="align-middle"><?= $data[$i][10] ?></td>
                            <td class="align-middle"><?= $data[$i][11] ?></td>
                            <td class="align-middle"><?= $data[$i][12] ?></td>
                            <td class="align-middle"><?= $data[$i][13] ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
            <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
        </div>        
    </div>

</div>
</div>
