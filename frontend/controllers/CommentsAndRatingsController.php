<?php

namespace frontend\controllers;

use Yii;
use common\models\CommentsAndRatings;
use common\models\CommentsAndRatingsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CommentsAndRatingsController implements the CRUD actions for CommentsAndRatings model.
 */
class CommentsAndRatingsController extends Controller
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
     * Lists all CommentsAndRatings models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CommentsAndRatingsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CommentsAndRatings model.
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
     * Creates a new CommentsAndRatings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CommentsAndRatings();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cr_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CommentsAndRatings model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cr_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CommentsAndRatings model.
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
     * Finds the CommentsAndRatings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CommentsAndRatings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CommentsAndRatings::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionRatingcomments()
    {
        
        if(isset($_REQUEST))
        {
        mysql_connect("localhost","sanahk","Moments786");
        mysql_select_db("efa2");
        error_reporting(E_ALL && ~E_NOTICE);

        $ven_id = $_POST['ven_id'];
        $comment = $_POST['comment'];
        $crtype = $_POST['usertype'];
        $rating = $_POST['rating'];
        $cruserid = $_POST['userid'];
       
        $sqluserid = mysql_query("select * from comments_and_ratings where cr_user_id=$cruserid and cr_type='V' AND cr_type_id=$ven_id");
        $row = mysql_fetch_row($sqluserid);
        if(count($row) <= 1) {
       
        $sql="INSERT INTO comments_and_ratings(cr_type_id,cr_type,cr_ratings,cr_comment,cr_user_id) VALUES ('$ven_id','$crtype','$rating','$comment','$cruserid')";
               } else {

            $sql="UPDATE comments_and_ratings SET cr_type_id ='$ven_id', cr_ratings ='$rating', cr_comment='$comment' where cr_user_id= '$cruserid' and cr_type='V' AND cr_type_id='$ven_id'";
            
       }
        $result=mysql_query($sql);
            if($result){

            echo "You have been successfully commented.";
            
            }
        }
    }
}
