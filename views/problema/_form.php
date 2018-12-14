<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\Complejidad;
use app\models\TipoTorneo;

/* @var $this yii\web\View */
/* @var $model app\models\Problema */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="problema-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTipo')->dropDownList(
        ArrayHelper::map(TipoTorneo::find()->all(), 'idTipo', 'Tipo'),
            ['prompt'=>'Seleccionar Tipo de Torneo']
    )?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Archivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Enunciado')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'idComplejidad')->dropDownList(
        ArrayHelper::map(Complejidad::find()->all(), 'idComplejidad', 'Complejidad'),
            ['prompt'=>'Seleccionar Complejidad']
    )?>
    <?= $form->field($model, 'TiempoEjecucionMax')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
