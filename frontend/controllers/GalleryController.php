<?php

namespace frontend\controllers;

use Yii;
use common\models\Gallery;
use common\models\Vendors;
use common\models\User;
use common\models\GallerySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
use yii\data\Pagination;

/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends Controller
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
     * Lists all Gallery models.
     * @return mixed
     */
    public function actionIndex()
    {
      $searchModel = new GallerySearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      $dataProvider->pagination->pageSize = 10;
      
      $user = \Yii::$app->user->identity;
      $userid = \Yii::$app->user->identity->id;
      
      $modelVendors = Vendors::find()->where(['ven_contact_person_id' => $userid, 'deleted' => 'N'])->one();
      
      $query1 = new \yii\db\Query;
      $query1->select('*')->from('gallery')->where(['gallery_ven_id' => $modelVendors->ven_id, 'deleted' => 'N']);
      $query1->createCommand();

      $dataProvider1 = new ActiveDataProvider([
        'query' => $query1,
        'pagination' => false,
        ]);

      return $this->render('index', [
        'searchModel' => $searchModel,
           // 'dataProvider' => $dataProvider,
        'dataProvider1' => $dataProvider1,
        ]);
    }

    /**
     * Displays a single Gallery model.
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
     * Creates a new Gallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      $model = new Gallery();
      $userId = \Yii::$app->user->identity->id;
      $model->gallery_user_id = $userId;
      // Set the path that the file will be uploaded to
      $path = Yii::getAlias('@common').'/web/';
      if ($model->load(Yii::$app->request->post())) {
       
        $model->file = UploadedFile::getInstance($model, 'file');
        $save_file = '';
        
        if($model->file){
          
          $imagename = Gallery::find()->orderBy('gallery_id DESC')->one();
          if(count($imagename) == 0) {

            $imagename= 1;
                $imagepath = 'images/gallery/'; // Create folder under web/uploads/logo
                $model->gallery_image = $imagepath.$imagename.'.'.$model->file->extension; 
                $save_file = 1;

              } else {
                $imagename= $imagename->gallery_id+1;
                $imagepath = 'images/gallery/'; // Create folder under web/uploads/logo
                $model->gallery_image = $imagepath.$imagename.'.'.$model->file->extension; 
                $save_file = 1;
              }

            }
            if ($model->save(false)) {
              if($save_file){
                $model->file->saveAs($path.$model->gallery_image);
              }
              return $this->redirect(['view', 'id' => $model->gallery_id]);
            }
          } else {
            return $this->render('create', [
              'model' => $model,
              
              ]);
          }
        }

    /**
     * Updates an existing Gallery model.
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
                $imagepath = 'images/gallery/'; // Create folder under web/uploads/logo
                $model->gallery_image = $imagepath.$model->gallery_id.'.'.$model->file->extension;
                $save_file = 1;
              }

              if ($model->save(false)) {
                if($save_file){
                  $model->file->saveAs($path.$model->gallery_image);
                }
                return $this->redirect(['view', 'id' => $model->gallery_id]);
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
     * Deletes an existing Gallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
     $model = $this->findModel($id);
     if ($model !== null) {
      $model->deleted = 'Y';
      $model->save();
      return $this->redirect(['index']);
    } else {
      $this->findModel($id)->delete();
    }
  }

    /**
     * Finds the Gallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
      if (($model = Gallery::findOne($id)) !== null) {
        return $model;
      } else {
        throw new NotFoundHttpException('The requested page does not exist.');
      }
    }
  }
