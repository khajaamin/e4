<?php

namespace backend\controllers;

use Yii;
use common\models\Latestpost;
use common\models\LatestpostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
use yii\data\Pagination;
use yii\filters\AccessControl;

/**
 * LatestpostController implements the CRUD actions for Latestpost model.
 */
class LatestpostController extends Controller
{
    public function behaviors()
    {
        return [
        'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index','create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
        'delete' => ['post'],
        ],
        ],
        ];
    }

    /**
     * Lists all Latestpost models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LatestpostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Displays a single Latestpost model.
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
     * Creates a new Latestpost model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

       $model = new Latestpost();

       $path = Yii::getAlias('@common').'/web/';
       if ($model->load(Yii::$app->request->post())) {
           // $model->news_ven_id =  $vendorsModel->ven_id;

        $model->save();
        
        $model->file = UploadedFile::getInstance($model, 'file');
        $save_file = '';
        
        if($model->file){

            $imagename = Latestpost::find()->orderBy('latest_post_id DESC')->one();
            if(count($imagename) == 0) {

                $imagename= 1;
                $imagepath = 'images/latestpost/'; // Create folder under web/uploads/logo
                $model->latest_post_image = $imagepath.$imagename.'.'.$model->file->extension; 
                $save_file = 1;

            } else {
                $imagename= $imagename->latest_post_id+1;
                $imagepath = 'images/latestpost/'; // Create folder under web/uploads/logo
                $model->latest_post_image = $imagepath.$imagename.'.'.$model->file->extension; 
                $save_file = 1;
            }

        }
        if ($model->save(false)) {
            if($save_file){
                $model->file->saveAs($path.$model->latest_post_image);
            }
            return $this->redirect(['view', 'id' => $model->latest_post_id]);
        }
           // return $this->redirect(['view', 'id' => $model->gallery_id]);
    } else {
        return $this->render('create', [
            'model' => $model,
            ]);
    }
}

    /**
     * Updates an existing Latestpost model.
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
                $imagepath = 'images/latestpost/'; // Create folder under web/uploads/logo
                $model->latest_post_image = $imagepath.$model->latest_post_id.'.'.$model->file->extension;
                $save_file = 1;
            }

            if ($model->save(false)) {
                if($save_file){
                    $model->file->saveAs($path.$model->latest_post_image);
                }
                return $this->redirect(['view', 'id' => $model->latest_post_id]);
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
     * Deletes an existing Latestpost model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
    $model = $this->findModel($id);
     if ($model !== null) {
      $model->latest_post_deleted = 'Y';
      $model->save();
      return $this->redirect(['index']);
    } else {
      $this->findModel($id)->delete();
    }
    }

    /**
     * Finds the Latestpost model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Latestpost the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Latestpost::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
