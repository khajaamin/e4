<?php

namespace frontend\controllers;

use Yii;
use common\models\Blog;
use common\models\User;
use common\models\BlogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class BlogController extends Controller
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
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
      $searchModel = new BlogSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      $dataProvider->pagination->pageSize = 10;

      $user = \Yii::$app->user->identity;
      $userid = \Yii::$app->user->identity->id;

       // $modelVendors = Blog::find()->where(['blog_user_id' => $userid, 'deleted' => 'N'])->one();

      $query1 = new \yii\db\Query;
      $query1->select('*')->from('blog')->where(['blog_user_id' => $userid, 'deleted' => 'N']);
      $query1->createCommand();

      $dataProvider1 = new ActiveDataProvider([
        'query' => $query1,
        'pagination' => false,
        ]);

      return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'dataProvider1' => $dataProvider1,
        ]);
    }

    /**
     * Displays a single Blog model.
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
     * Creates a new Blog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      $model = new Blog();

      $user = \Yii::$app->user->identity;
      $userType = \Yii::$app->user->identity->type;
        // Set the path that the file will be uploaded to
      $path = Yii::getAlias('@common').'/web/';
      if($userType == 'Vendor' || $userType == 'Visitor' || $userType == 'FB' || $userType == 'GL') {

        $userId = \Yii::$app->user->identity->id;
        $model->blog_user_id = $userId;



        if($model->load(Yii::$app->request->post())){
          $model->file = UploadedFile::getInstance($model, 'file');
          $save_file = '';
          if($model->file){
            $imagename = Blog::find()->orderBy('blog_id DESC')->one();
               // echo ''.count($imagename);
               // exit();
            if(count($imagename) ==0) {
              $imagename=1;
              $imagepath = 'images/blogs/'; 
              $model->blog_image = $imagepath.$imagename.'.'.$model->file->extension;
              $save_file = 1;
            } else {
              $imagename=$imagename->blog_id+1;
              $imagepath = 'images/blogs/'; 
              $model->blog_image = $imagepath.$imagename.'.'.$model->file->extension;
              $save_file = 1;
            }
          }

          if ($model->save(false)) {
            if($save_file){
              $model->file->saveAs($path.$model->blog_image);
            }
            return $this->redirect(['view', 'id' => $model->blog_id]);
          }
        }else {
          return $this->render('create', [
            'model' => $model,
            ]);
        }

      }else {

       Yii::$app->user->logout();
       $this->redirect(Yii::$app->getUser()->loginUrl);

     }
   }

    /**
     * Updates an existing Blog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
      $model = $this->findModel($id);
        // Set the path that the file will be uploaded to
      $path = Yii::getAlias('@common').'/web/';
      if($model->load(Yii::$app->request->post())){
        $model->file = UploadedFile::getInstance($model, 'file');
        $save_file = '';
        if($model->file){
                $imagepath = 'images/blogs/'; // Create folder under web/uploads/logo
                $model->blog_image = $imagepath.$model->blog_id.'.'.$model->file->extension;
                $save_file = 1;
              }

              if ($model->save(false)) {
                if($save_file){
                  $model->file->saveAs($path.$model->blog_image);
                }
                return $this->redirect(['view', 'id' => $model->blog_id]);
              }

            } else {
              return $this->render('update', [
                'model' => $model,
                ]);
            }
          }
          public function actionDeleteimg($id, $field)
          {

            $img = $this->findModel($id)->$field;
            if($img){
              if (!unlink(Yii::getAlias('@common').'/web/'.$img)) {
                return false;
              }
            }

            $img = $this->findModel($id);
            $img->$field = NULL;
            $img->update();

            return $this->redirect(['update', 'id' => $id]);
          }

    /**
     * Deletes an existing Blog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
      $model = $this->findModel($id);
      if ($model != null) {
        $model->deleted = 'Y';
        $model->save();
        return $this->redirect(['index']);
      } else {
        $this->findModel($id)->delete();
      }
    }

    /**
     * Finds the Blog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
      if (($model = Blog::findOne($id)) !== null) {
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

        $blogid = $_POST['blogid'];
        $comment = $_POST['comment'];
        $crtype = $_POST['usertype'];
        $cruserid = $_POST['userid'];

        $sql="INSERT INTO comments_and_ratings(cr_type_id,cr_type,cr_comment,cr_user_id,cr_ratings) VALUES ('$blogid','$crtype','$comment','$cruserid','0')";
        
        $result=mysql_query($sql);
        if($result){

          echo "You have been successfully commented.";
          
        }
      }
    }
  }
