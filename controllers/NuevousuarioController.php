<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use app\models\NuevoUsuario;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\LoginForm;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class NuevousuarioController extends Controller
{
    /**
     * {@inheritdoc}
     */


  



    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }



    /**
     * Creates a new NuevoUsuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NuevoUsuario();


                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    $LoginFrom = new LoginForm;
                    $LoginFrom->password = $model->Clave;
                    $LoginFrom->username = $model->NombreUsuario;
                    if ($LoginFrom->login()){
                        // provisoriamente lo inscribe al torneo programate para hacegurar el registro
                        //$this->redirect(array('/torneo/inscripcion','idTorneo'=>1));
                        $this->redirect(array('/site'));
                    
                    }else{
                            $this->redirect(array('/site/login'));
                    }
                }
            return $this->render('nuevousuario', [
    
                'model' => $model,
            ]);
                        

       
    }

    /**
     * Updates an existing NuevoUsuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

       // $model->ReClave=$model->Clave;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idUsuario]);
        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdateclave($id)
    {
        $model = $this->findModelNuevoUsuario($id);

        $model->ReClave=$model->Clave;
        $model->scenario=NuevoUsuario::SCENARIO_UPDATECLAVE;
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idUsuario]);
        }


        return $this->render('updateclave', [
            'model' => $model,
        ]);
    }

   
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelNuevoUsuario($id)
    {
        if (($model = NuevoUsuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
