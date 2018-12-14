<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Lenguaje */

$this->title = 'Create Lenguaje';
$this->params['breadcrumbs'][] = ['label' => 'Lenguajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lenguaje-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
