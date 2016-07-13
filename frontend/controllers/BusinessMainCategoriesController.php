<?php

namespace frontend\controllers;

use Yii;
use common\models\BusinessMainCategories;
use common\models\BusinessMainCategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\data\Pagination;
/**
 * BusinessMainCategoriesController implements the CRUD actions for BusinessMainCategories model.
 */
class BusinessMainCategoriesController extends Controller
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
     * Lists all BusinessMainCategories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BusinessMainCategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BusinessMainCategories model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BusinessMainCategories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BusinessMainCategories();
        // Set the path that the file will be uploaded to
        $path = Yii::getAlias('@common').'/web/';
        if($model->load(Yii::$app->request->post())){
            $model->file = UploadedFile::getInstance($model, 'file');
            $save_file = '';
            if($model->file){
                $imagename = BusinessMainCategories::find()->orderBy('bmc_id DESC')->one();
                if(count($imagename) == 0) {
                    $imagename=1;
                    $imagepath = 'images/imgevents/main/'; // Create folder under web/uploads/logo
                    $model->bmc_image = $imagepath.$imagename.'.'.$model->file->extension;
                    $save_file = 1;
                } else {
                    $imagename=$imagename->bmc_id+1;
                    $imagepath = 'images/imgevents/main/'; // Create folder under web/uploads/logo
                    $model->bmc_image = $imagepath.$imagename.'.'.$model->file->extension;
                    $save_file = 1;
                }
            }

            if ($model->save(false)) {
                if($save_file){
                    $model->file->saveAs($path.$model->bmc_image);
                }
                return $this->redirect(['view', 'id' => $model->bmc_id]);
            }
        }else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BusinessMainCategories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
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
                $imagepath = 'images/imgevents/main/'; // Create folder under web/uploads/logo
                $model->bmc_image = $imagepath.$model->bmc_id.'.'.$model->file->extension;
                $save_file = 1;
            }

            if ($model->save(false)) {
                if($save_file){
                    $model->file->saveAs($path.$model->bmc_image);
                }
                return $this->redirect(['view', 'id' => $model->bmc_id]);
            }
        }else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BusinessMainCategories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BusinessMainCategories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return BusinessMainCategories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BusinessMainCategories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDeleteimg($id, $field)
    {

        $img = $this->findModel($id)->$field;
        if($img){
            if (!unlink($img)) {
                return false;
            }
        }

        $img = $this->findModel($id);
        $img->$field = NULL;
        $img->update();

        return $this->redirect(['update', 'id' => $id]);
    }
}
