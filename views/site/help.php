<?php



use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Usuario;
use app\models\TorneoUsuario;
use app\models\Torneo;

$this->title = 'Ayuda';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1>Manual paso a paso</h1>
    
    
    <div class="row">
        
        <div class="col-lg-4">
        <h3>Primer paso</h3>
        <h3>
            <?= Html::a('Inicia sesion', ['/site/login'], ['class'=>'btn btn-primary']) ?>
            o
            <?= Html::a('Registrate', ['/logon/create'], ['class'=>'btn btn-success']) ?>
           
           <br/>
            <?php if(!Yii::$app->user->isGuest){
            echo 'Ya cumplió este paso';
            }?>

       </h3>
        </div>

        <div class="col-lg-4">
        <h3>Segundo paso</h3>
        <h3>
            <?= Html::a('Inscribite a un Torneo!', ['/torneo/index'], ['class'=>'btn btn-primary']) ?>
       </h3>
        
        <br />
       
       <?php 
      

        if(!Yii::$app->user->isGuest){
            $usuario=Usuario::find(Yii::$app->user->identity->idUsuario)->one();
      
            $torneoUsuarios=$usuario->torneoUsuarios;

            if(!is_null($usuario) and count($torneoUsuarios)>=0){
                echo 'Ya cumplió este paso. Y esta inscripto en los siguientes torneos:';

                foreach ($torneoUsuarios as $torneo) {
                echo ('<br>Torneo '.$torneo->torneo->Nombre.' token: '.$torneo->Token.' <br>');
                }
                
            
            }
        }
        ?>
       </div>


       <div class="col-lg-4">
        <h3>Tercer paso</h3>
        <h3>
            <?= Html::a('Descarga el Stub correspondiente', ['/site/stub'], ['class'=>'btn btn-primary']) ?>
       </h3>
       </div>

       <div class="col-lg-4">
        <h3>Cuarto paso</h3>
        <h4>
            Copiar el token que tiene asignado el torneo 
            y pegarlo en el Stub donde indican los comentarios 
            de los fuentes descargados junto con el Stub. 
            <br />
            Finalmente resolver cada ejercicio del torneo modificando 
            en el Stub el número de problema y la resolución del mismo. 
        </h4>
       </div>

       <div class="col-lg-4">
        <h3>¿Quién gana?</h3>
        <h4>
        Gana el equipo que resuelve mas problemas.
        En caso de empate en cantidad de ejercicios resueltos, 
        se desempata por el menor tiempo de resolución del último 
        ejercicio resuelto. 
        </h4>
       </div>

       <div class="col-lg-4">
        <h3>¿Como ayudo a Hornero?</h3>
        <h4>
        Si queres participar del desarrollo de Hornero,
        podes descargar los fuentes y subir modificaciones a 
        los stubs o a la aplicación <a href="https://github.com/pkogan/hornero">Haciendo click acá</a>
        <p> Otra forma de ayudar es creando nuevos 
            problemas con sus respectivas soluciones 
            para mejorar la base de datos de ejercicios.
        </p>

        </h4>
       </div>

       <div class="col-lg-4">
        <h3>Instalá tu propio Hornero!</h3>
        <h4>
        Descargar los fuentes <a href="https://github.com/pkogan/hornero">Haciendo click acá</a>, 
        y seguir las intrucciones del readme. 
        Esta solución es la recomendada para lugares sin conexión a internet.
        </h4>
       </div>
    </div>

 


   
</div>
