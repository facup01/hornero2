<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\ValidarFormulario;
use app\models\FormAlumnos;
use app\models\Alumnos;
use app\models\FormSearch;
use yii\helpers\Html;
use yii\data\Pagination;//Controlador para paginacion
use app\models\User;

use app\components\AccessRule;




class SiteController extends Controller
{
/////////////////////////////CREADOS POR MI/////////////////////////


public function behaviors()
{
    return [
        
        'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
                'logout' => ['post'],
            ],
        ],
    ];
}

    public function actionGestionarUsuarios(){
        return $this->render("/persona");
    }

   
    

/*    public function actionView(){
        $form=new FormSearch;
        $search=null;

        if($form->load(Yii::$app->request->get())){
            if($form->validate()){
                $search=Html::encode($form->q);//Accedemos al valor de la busqueda del usuario
                $table=Alumnos::find()
                    ->where(["like","id_alumno",$search])
                    ->orWhere(["like","nombre",$search])
                    ->orWhere(["like","apellido",$search]);

                $count= clone $table;//Clono tabla que tiene los resultados de la consulta
                $pages= new Pagination([
                    "pageSize"=>5,//tamaño por pagina
                    "totalCount"=>$count->count()//Tamaño total de la consulta
                ]);
                    
                $model=$table
                    ->offset($pages->offset)
                    ->limit($pages->limit)
                    ->all();

            }else{
                $form->getErrors();
            }
        }else{
            //Si el formulario no es enviado, mostraremos todos los registros
            $table=Alumnos::find();
            $count= clone $table;//Clono tabla que tiene los resultados de la consulta
            $pages= new Pagination([
                "pageSize"=>5,//tamaño por pagina
                "totalCount"=>$count->count()//Tamaño total de la consulta
            ]);

            $model=$table
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
            
        }

        return $this->render("view", ['model'=>$model,'form'=>$form, 'search'=>$search,'pagess'=>$pages]);
            //Vista que muestra los datos y ademas envia las paginas 

    }
*/


    public function actionViewSinPaginacion(){
        //Accion para ver los datos de la tabla Alumnos

        $table=new Alumnos;//Nos traemos la tabla
        $model=$table->find()->all();//Metodo que trae todos los registros de la tabla
                //INVESTIGAR SOBRE METODO FIND

        $form=new FormSearch;
        $search=null; //esta incluye el resutlado de la busqueda

        if($form->load(Yii::$app->request->get())){//Si el form es de tipo get
            if($form->validate()){

                $search=Html::encode($form->q);//Encode convierte entidades especiales en caracteres HTML
                $query="SELECT * FROM alumnos WHERE id_alumno LIKE '%$search%' OR 
                    nombre LIKE '%$search%' OR apellido LIKE '%$search%';";
                //Incluimos lo que busca el usuario en la consulta sql query

                //ahora cambiamos el valor de la variable model
                $model=$table->findBySql($query)->all();
            }else{
                $form->getErrors();
            }
        }

        
        return $this->render("view", ['model'=>$model, 'form'=>$form, 'search'=>$search]);//Vista que muestra los datos 
    }

    public function actionCreate(){
        
        //Aca se crea la instancia para validar el formulario
        $model=new FormAlumnos;
        $msj=null; //var para mostrar msj cuando el registro es guardado correctamente

        if($model->load(Yii::$app->request->post())){//Si el form es enviado a travez de post

            if($model->validate()){//Si el formulario es validado correctamente

                $table=new Alumnos; //Instancia para conectar a la bd
                //Ahora asignamos a cada columna su valor:

                $table->nombre=$model->nombre;
                $table->apellido=$model->apellido;
                $table->clase=$model->clase;
                $table->nota_final=$model->nota_final;
                
                if($table->insert()){//Si insertamos los datos correctamente
                    $msj="Datos almacenados correctamente!";
                    $model->nombre=null;
                    $model->apellido=null;
                    $model->clase=null;
                    $model->nota_final=null;
                   
                    return  $this->redirect(["view"]);

                    //Finalmente esos datos se los enviamos a la vista en el metodo render del final
                }else{
                    $msj="Datos NO almacenados =(";
                }

            }else{
                $model->getErrors();
            }

        }


      //  return $this->render("view", ['model'=>$model]);
        return $this->render("create",['model'=>$model, 'msj'=>$msj]);
    }


    public function actionFormulario($mensaje=null){//Recibo el valor de variable mensaje, por
                                                        // defecto null
        return $this->render("formulario", ["mensaje"=>$mensaje]);
    }

    public function actionRequest(){
        $mensaje=null;
        //La variable global _REQUEST permite obtener datos get, post y cookies
        if(isset($_REQUEST["nombre"])){
            $mensaje="Has introducido el nombre: ".$_REQUEST["nombre"];
        }
        //Aca redirecciono al sitio web "Formulario" y envio el valor de la variable
        //con el identificador "mensaje"
        $this->redirect(["formulario", "mensaje"=>$mensaje]);

    }

    public function actionValidarformulario(){

        $model= new ValidarFormulario; //Creo la instancia del modelo

        if($model->load(Yii::$app->request->post())){
            //Si el formulario es enviado

            if($model->validate()){
                //Si el formulario es validado
                $mensaje="HOLAA";
                $this->redirect(["validarformulario", "mensaje"=>$mensaje]);

                //ACA HARIA LAS ACCIONES CORRESPONDIENTES
                //por ejemplo: Consultar en una BD
            }else{
                //SI no es valido, mostramos los errores
                $model->getErrors();
            }
        }

        //Aca renderizamos la vista y ademas enviamos el modelo a la vista
        return $this->render("validarformulario", ["model"=>$model]); 
    }



/////////////////////////////FIN CREADOS POR MI/////////////////////////





    /**
     * {@inheritdoc}
     */
  /*  public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
*/
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
/*   public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
*/

public function actionLogin(){
    if (!\Yii::$app->user->isGuest) {

     //   if (User::isUserAdmin(Yii::$app->user->identity->id)){
            return $this->redirect(["index/view"]);
       // }
     //else{
       //     return $this->redirect(["site/index"]);
       // }
    }

    $model = new LoginForm();
    
    if ($model->load(Yii::$app->request->post()) && $model->login()) {

       // if (User::isUserAdmin(Yii::$app->user->identity->id)){
            return $this->redirect(["site/index"]);
       // }else{
        //    return $this->redirect(["site/view"]);
        //}

    }else{
        return $this->render('login', [
            'model' => $model,
        ]);
    }
}
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
   
    public function actionHelp()
    {
        return $this->render('help');
    }

    public function actionStub()
    {
        return $this->render('stub');
    }
   
    public function actionSay($message ='Hola')
    {
    return $this->render('say', ['message' => $message]);
    }

    public function actionEntry()
    {
        $model = new EntryForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
            // validar los datos recibidos en el modelo
            // ´ıaqu haz algo significativo con el modelo ...
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // la ´apgina es mostrada inicialmente o hay ´ualgn error de´ovalidacin
            return $this->render('entry', ['model' => $model]);
        }
    }






}
