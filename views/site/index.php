<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron" >
        <h1>Bienvenidos!</h1>

        <p class="lead">Este es el torneo de programación Hornero 2.</p>
        <br>
        <?= Html::img('@web/images/prisma455.png',
            ['alt'=>'Prisma','width'=>300,'class'=>'glyphicon glyphicon-th-large gly-spin img-circle'])?>
        <br>
        <br>
        <br>
        <br>
        <?= Html::a('¡Comenzar a jugar!', ['/torneo/index'], ['class'=>'btn btn-lg btn-success']) ?>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-5">
                <h2>Cualquier lenguaje es aceptado.</h2>

                <p>Java, Python, Php, C, C++, Pascal, JavaScript, C#,
                 Ciao-Prolog, Perl, Bash, Lisp, Ruby, Smalltalk, PSeInt... Cualquier lenguaje</p>

            </div>
            <div class="col-lg-3">
                <h2>¿Quién puede jugar?</h2>

                <p>Puede jugar el que quiera. Está abierto a cualquier programador,
                 de cualquier lugar del mundo, sin límite ni de edad ni de título.</p>

            </div>
            <div class="col-lg-3">
                <h2>Se puede rellenar</h2>

                <p>Se puede rellenar.</p>

            </div>
        </div>

    </div>
</div>
