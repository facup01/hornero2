<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Modificar Clave de: ' . $model->NombreUsuario;
$this->params['breadcrumbs'][] = ['label' => $model->NombreUsuario, 'url' => ['view', 'id' => $model->idUsuario]];
$this->params['breadcrumbs'][] = ['label' => 'Modificar clave'];

?>
<div class="usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formupdateclave', [
        'model' => $model,
    ]) ?>

</div>
