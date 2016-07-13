<?php

namespace frontend\controllers;

use Yii;
use common\models\BusinessSubCategories;
use common\models\BusinessSubCategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\data\Pagination;
/**
 * BusinessSubCategoriesController implements the CRUD actions for BusinessSubCategories model.
 */
class BusinessSubCategoriesController extends Controller
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
     * Lists all BusinessSubCategories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BusinessSubCategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Displays a single BusinessSubCategories model.
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
     * Creates a new BusinessSubCategories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BusinessSubCategories();
        // Set the path that the file will be uploaded to
        $path = Yii::getAlias('@common').'/web/';
        if($model->load(Yii::$app->request->post())){
            $model->file = UploadedFile::getInstance($model, 'file');
            $save_file = '';
            if($model->file){
                $imagename = BusinessSubCategories::find()->orderBy('bsc_id DESC')->one();
                if(count($imagename) == 0) {
                    $imagename=1;
                    $imagepath = 'images/imgevents/sub/'; // Create folder under web/uploads/logo
                    $model->bsc_image = $imagepath.$imagename.'.'.$model->file->extension;
                    $save_file = 1;
                } else {
                    $imagename=$imagename->bsc_id+1;
                    $imagepath = 'images/imgevents/sub/'; // Create folder under web/uploads/logo
                    $model->bsc_image = $imagepath.$imagename.'.'.$model->file->extension;
                    $save_file = 1;
                }
            }

            if ($model->save(false)) {
                if($save_file){
                    $model->file->saveAs($path.$model->bsc_image);
                }
                return $this->redirect(['view', 'id' => $model->bsc_id]);
            }
        }else {
            return $this->render('create', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Updates an existing BusinessSubCategories model.
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
                $imagepath = 'images/imgevents/sub/'; // Create folder under web/uploads/logo
                $model->bsc_image = $imagepath.$model->bsc_id.'.'.$model->file->extension;
                $save_file = 1;
            }

            if ($model->save(false)) {
                if($save_file){
                    $model->file->saveAs($path.$model->bsc_image);
                }
                return $this->redirect(['view', 'id' => $model->bsc_id]);
            }
        }else {
            return $this->render('update', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Deletes an existing BusinessSubCategories model.
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
     * Finds the BusinessSubCategories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BusinessSubCategories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BusinessSubCategories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //Added code by Nayan for getting city list
    public function actionLists($id)
    {
        $countBSCategories = BusinessSubCategories::find()->where(['bmc_id' => $id])->count();
        $businessSubCategories = BusinessSubCategories::find()->where(['bmc_id' => $id])->all();
        if ($countBSCategories > 0) {
            foreach ($businessSubCategories as $businessSubCategory) {
                echo "<option value='" . $businessSubCategory->bsc_id . "'>" . $businessSubCategory->bsc_name . "</option>";
            }
        } else {
            echo "<option> - </option>";
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
