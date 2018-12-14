<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Problema */

$this->title = 'Update Problema: ' . $model->idProblema;
$this->params['breadcrumbs'][] = ['label' => 'Problemas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProblema, 'url' => ['view', 'id' => $model->idProblema]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="problema-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
