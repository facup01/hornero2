<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\Lenguaje;
use app\models\Rol;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Clave')->passwordInput(['maxlength' => true]) ?>   

    <?= $form->field($model, 'ReClave')->passwordInput(['maxlength' => true]) ?>    


 


    <div class="form-group">
        <?= Html::submitButton('Modificar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
