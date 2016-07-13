<?php

namespace frontend\controllers;

use Yii;
use common\models\Own;
use common\models\OwnSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OwnController implements the CRUD actions for Own model.
 */
class OwnController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Own models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OwnSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Own model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Own model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Own();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->own_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Own model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->own_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Own model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Own model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Own the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Own::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionOwndetail()
    {
        
        if(isset($_REQUEST))
        {
        mysql_connect("localhost","sanahk","Moments786");
        mysql_select_db("efa2");
        error_reporting(E_ALL && ~E_NOTICE);

        $ven_id = $_POST['ven_id'];
        $name = $_POST['name'];
        $contactnumber = $_POST['contactnumber'];
        $email = $_POST['email'];
        $from = "info@eventforall.com";
        $sub = "Regarding credentials for the Business Owner";
       // exit();

        $sql="INSERT INTO own(own_ven_id,name,contact,email) VALUES ('$ven_id','$name','$contactnumber','$email')";
       
        $result=mysql_query($sql);
        if($result){
            echo "We have received your request successfully !";
            return Yii::$app->mail->compose()
                ->setFrom($from)
                ->setTo($from)
                ->setSubject($sub)
                ->setTextBody('The Owner '.$email.' is asking for his credentials.')
                ->send();
        }
    }
}
}
