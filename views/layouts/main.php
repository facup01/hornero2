<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/logo-transparente.png',
            ['alt'=>Yii::$app->name,'width'=>40,'class'=>'pull-left']).Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $items=[
        ['label' => 'Inicio', 'url' => ['/site/index']],
        ['label' => 'Gestionar Torneos', 'url' => ['/torneo/index'],'visible'=>Yii::$app->user->identity=='Administrador'],
        ['label' => 'Gestionar Problemas', 'url' => ['/problema/index']],
        ['label' => 'Ayuda', 'url' => ['/site/help']],
        ['label' => 'Acerca de', 'url' => ['/site/about']],
        ['label' => 'Contacto', 'url' => ['/site/contact']],
        ['label' => 'Stubs', 'url' => ['/site/stubs']]];
    if(Yii::$app->user->isGuest){
        $items[]=['label' => 'Login', 'url' => ['/site/login']];
    }
        else{
            $items[]=    ['label' => 'Perfil', 'url' => ['/nuevousuario/view','id'=>Yii::$app->user->identity->idUsuario]];
            $items[]=(

            
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->NombreUsuario . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
                );
        }
    ;
    echo Nav::widget([
        //Hay un parametro que indica quien tiene permisos para cada item del menu
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' =>  $items,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Hornero 2 - Facultad de Informatica UNCOMA <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
