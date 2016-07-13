<?php

namespace frontend\controllers;

use Yii;
use common\models\Enquiries;
use common\models\NewsEnquiries;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EnquiriesController implements the CRUD actions for Enquiries model.
 */
class EnquiriesController extends Controller
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
     * Lists all Enquiries models.
     * @return mixed
     */
    public function actionIndex()
    {
       // echo 'hiii';
        //.$_GET['name'];
       // exit();
        $searchModel = new NewsEnquiries();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Enquiries model.
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
     * Creates a new Enquiries model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Enquiries();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->enq_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Enquiries model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->enq_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Enquiries model.
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
     * Finds the Enquiries model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Enquiries the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Enquiries::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionInsertenquiries()
    {
        
        if(isset($_REQUEST))
        {
        mysql_connect("localhost","sanahk","Moments786");
        mysql_select_db("efa2");
        error_reporting(E_ALL && ~E_NOTICE);

        $ven_id = $_POST['ven_id'];
        $bsc_id = $_POST['bsc_id'];
        $name = $_POST['name'];
        $contactnumber = $_POST['contactnumber'];
        $message = $_POST['message'];
        $email = $_POST['email'];
        $from = "info@eventforall.com";
        $sql="INSERT INTO enquiries(enq_ven_id,enq_bsc_id,enq_name,enq_mob,enq_email,enq_comment) VALUES ('$ven_id','$bsc_id','$name','$contactnumber','$email','$message')";
       
        $result=mysql_query($sql);
            if($result){
                echo "You have been successfully sent Email.";
                return Yii::$app->mail->compose()
                    ->setFrom($from)
                    ->setTo($email)
                    ->setSubject($message)
                    ->send();
            }
        }
    }
    
}
