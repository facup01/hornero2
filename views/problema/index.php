<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProblemaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Problemas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problema-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Problema', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idProblema',
            'idTipo',
            'Nombre',
            'Archivo',
            'Enunciado:ntext',
            //'idComplejidad',
            //'TiempoEjecucionMax',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
