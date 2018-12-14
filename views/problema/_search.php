<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProblemaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="problema-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idProblema') ?>

    <?= $form->field($model, 'idTipo') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Archivo') ?>

    <?= $form->field($model, 'Enunciado') ?>

    <?php // echo $form->field($model, 'idComplejidad') ?>

    <?php // echo $form->field($model, 'TiempoEjecucionMax') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
