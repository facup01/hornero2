<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lenguaje */

$this->title = 'Update Lenguaje: ' . $model->idLenguaje;
$this->params['breadcrumbs'][] = ['label' => 'Lenguajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idLenguaje, 'url' => ['view', 'id' => $model->idLenguaje]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lenguaje-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
