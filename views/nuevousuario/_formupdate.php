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

    <?= $form->field($model, 'Institucion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NombreUsuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textarea(['maxlength' => true]) ?>
  
    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idRol')->dropDownList(
        ArrayHelper::map(Rol::find()
            ->where(['idRol'=>2])
            ->orWhere(['idRol'=>3])->all(), 'idRol', 'Rol'),
            ['prompt'=>'Seleccionar Tipo de usuario']
    )?>

    <?= $form->field($model, 'idLenguaje')->dropDownList(
        //Aca esta el combo desplegable para seleccionar la descripcion del lenguaje y se almacene el id
        ArrayHelper::map(Lenguaje::find()->all(), 'idLenguaje', 'Lenguaje'),
            ['prompt'=>'Seleccionar Lenguaje']
    )?>


    <div class="form-group">
        <?= Html::submitButton('Modificar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
