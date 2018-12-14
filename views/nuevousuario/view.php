<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = $model->NombreUsuario;
//$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Html::a('Modificar Datos', ['update', 'id' => $model->idUsuario], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Modificar Clave', ['updateclave', 'id' => $model->idUsuario], ['class' => 'btn btn-primary']) ?>
      
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'idUsuario',
            'Institucion',
            'NombreUsuario',
            'Descripcion',
          //  'Clave',
            'rol.Rol',
            'Email:email',
            'lenguaje.Lenguaje',
        ],
    ]) ?>

</div>
