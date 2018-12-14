<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TorneoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Torneos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="torneo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Torneo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTorneo',
            'Nombre',
            'Descripcion:ntext',
            'FechaInicio',
            'FechaFin',
            //'idEstado',
            //'idTipo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
