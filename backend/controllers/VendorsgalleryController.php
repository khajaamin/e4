<?php

namespace backend\controllers;

use Yii;
use common\models\Model;
use common\models\User;
use common\models\Vendors;
use common\models\Vendorsgallery;
use frontend\models\SignupForm;
use frontend\models\SignupForm2;
use common\models\VendorsSearch;
use common\models\VendorsMoreCategories;
use common\models\BusinessMainCategories;
use common\models\BusinessSubCategories;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;

/**
 * VendorsController implements the CRUD actions for Vendors model.
 */
class VendorsgalleryController extends Controller
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
     * Lists all Vendors models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VendorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;

        $query1 = new \yii\db\Query;
        $query1->select('*')->from('vendors')->where(['deleted' => 'N','ven_verified' => 'Y']);
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
    public function actionLogout()
    {
       Yii::$app->user->logout();
       // Yii::$app->session->setFlash('success', 'Success');
       $this->redirect(Yii::$app->getUser()->loginUrl);
        //$this->redirect(['login']);
   }

   public function actionSignup()
   {
    $model = new SignupForm();
    if ($model->load(Yii::$app->request->post())) {

        if ($user = $model->signup()) {
                return $this->redirect(['login']);//redirect to the login page
                if (Yii::$app->getUser()->login($user)) {
                }
            }
        }
        $model2 = new SignupForm2();
        if ($model2->load(Yii::$app->request->post())) {
            if ($user = $model2->signup()) {
                return $this->redirect(['login']);//redirect to the login page
                if (Yii::$app->getUser()->login($user)) {
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
            'model2' => $model2,
            ]);
    }
    /**
     * Displays a single Vendors model.
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
     * Creates a new Vendors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Vendors();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ven_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                ]);
        }
   }

    /**
     * Updates an existing Vendors model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ven_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Deletes an existing Vendors model.
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
     * Finds the Vendors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vendors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vendors::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
