<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;
?>

<h1>Validar formulario </h1>

<?php $form=ActiveForm::begin([
    "method"=>"post",
    "enableClientValidation"=>true,

]);
?>

<div class="form-group"> 
    <?= $form->field($model, "nombre")->input("text"); ?>
</div>

<div class="form-group"> 
    <?= $form->field($model, "email")->input("email"); ?>
</div>

<?= Html::submitButton("Enviar", ["class"=> "btn btn-primary"]) ?>

<?php $form->end(); ?>