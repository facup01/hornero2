<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\seacrchUsuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idUsuario') ?>

    <?= $form->field($model, 'Institucion') ?>

    <?= $form->field($model, 'NombreUsuario') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'Clave') ?>

    <?php // echo $form->field($model, 'idRol') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'idLenguaje') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
