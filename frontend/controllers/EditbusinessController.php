<?php

namespace frontend\controllers;

use Yii;
use common\models\Editbusiness;
use common\models\EditbusinessSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EditbusinessController implements the CRUD actions for Editbusiness model.
 */
class EditbusinessController extends Controller
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
     * Lists all Editbusiness models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EditbusinessSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Editbusiness model.
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
     * Creates a new Editbusiness model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Editbusiness();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->edit_bui_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Editbusiness model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->edit_bui_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Editbusiness model.
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
     * Finds the Editbusiness model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Editbusiness the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Editbusiness::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionEdit()
    {
        
        if(isset($_REQUEST))
        {
        mysql_connect("localhost","sanahk","Moments786");
        mysql_select_db("efa2");
        error_reporting(E_ALL && ~E_NOTICE);

        $ven_id = $_POST['ven_id'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $edittype = $_POST['edittype'];
        $editusertype = $_POST['editusertype'];
        $comment = $_POST['comment'];
       
        $sql="INSERT INTO editbusiness(edit_ven_id,edit_bui_email,edit_bui_contact,edit_type,edit_user_type,edit_bui_comment) 
        VALUES ('$ven_id','$email','$contact','$edittype','$editusertype','$comment')";
       
        $result=mysql_query($sql);
            if($result){

            echo "You have been successfully send comment.";
            
            }
        }
    }
}
