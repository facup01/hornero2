<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lenguaje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lenguaje-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Lenguaje')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
