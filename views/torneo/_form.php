<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\time;
use yii\helpers\ArrayHelper;

use app\models\EstadoTorneo;
use app\models\TipoTorneo;

/* @var $this yii\web\View */
/* @var $model app\models\Torneo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="torneo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'FechaInicio')->widget(\janisto\timepicker\TimePicker::className(), [
    //'language' => 'fi',
    'mode' => 'datetime',
    'clientOptions'=>[
        'dateFormat' => 'yy-mm-dd',
        'timeFormat' => 'HH:mm:ss',
        'showSecond' => true,
        ]
    ]); ?>

    <?= $form->field($model, 'FechaFin')->widget(\janisto\timepicker\TimePicker::className(), [
    //'language' => 'fi',
    'mode' => 'datetime',
    'clientOptions'=>[
        'dateFormat' => 'yy-mm-dd',
        'timeFormat' => 'HH:mm:ss',
        'showSecond' => true,
        ]
    ]); ?>

   <?= $form->field($model, 'idEstado')->dropDownList(
        ArrayHelper::map(EstadoTorneo::find()->all(), 'idEstado', 'Estado'),
            ['prompt'=>'Seleccione el estado del Torneo']
    )?>

   <?= $form->field($model, 'idTipo')->dropDownList(
        ArrayHelper::map(TipoTorneo::find()->all(), 'idTipo', 'Tipo'),
            ['prompt'=>'Seleccione el Tipo de Torneo']
    )?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
