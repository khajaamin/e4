<?php

namespace backend\controllers;

use Yii;
use common\models\Model;
use common\models\User;
use common\models\Vendors;
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
class VendorsController extends Controller
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

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionLogout()
    {
       /* Yii::$app->user->logout();

       return $this->goHome();*/
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
                $id = Yii::$app->db->getLastInsertID();
                return $this->redirect(['create', 'id' => $id]);//redirect to the login page
                // if (Yii::$app->getUser()->login($user)) {
                // }
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
    public function actionCreate($id)
    {
        $model = new Vendors();
        
        $user = \Yii::$app->user->identity;
        $userType = \Yii::$app->user->identity->type;
        // Set the path that the file will be uploaded to
        $path = Yii::getAlias('@common').'/web/';
        if($userType == 'Admin') {
            
            // $userId = \Yii::$app->user->identity->id;
            $model->ven_contact_person_id = $id;
            
            $modelsVendorsMoreCategories = [new VendorsMoreCategories];
            if($model->load(Yii::$app->request->post())){ 

            $yearCount = $model->ven_established_date;
            $currentYear = date("Y");
            $pastYear = $currentYear - $yearCount;
            $model->ven_established_date = $pastYear;

         
                $modelsVendorsMoreCategories = Model::createMultiple(VendorsMoreCategories::classname());
                Model::loadMultiple($modelsVendorsMoreCategories, Yii::$app->request->post());
                $transaction = \Yii::$app->db->beginTransaction();
                try {

                    if ($flag = $model->save(false)) {                        
                        //$userModel->type = 'Vendor';
                        //$userModel->save();
                        foreach ($modelsVendorsMoreCategories as $modelVendorsMoreCategories) {
                            $modelVendorsMoreCategories->ven_id = $model->ven_id;
                            if (!($flag = $modelVendorsMoreCategories->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    
                    if ($flag) {
                        $transaction->commit();
                        $model->file = UploadedFile::getInstance($model, 'file');
                        $save_file = '';
                        if($model->file){
                            $imagename = Vendors::find()->orderBy('ven_id DESC')->one();
                            if(count($imagename) == 0) {
                                $imagename=1;
                                $imagepath = 'images/imgvendors/'; // Create folder under web/uploads/logo
                                $model->ven_business_logo = $imagepath.$imagename.'.'.$model->file->extension;
                                $save_file = 1;
                            } else {
                                $imagename=$imagename->ven_id;
                                $imagepath = 'images/imgvendors/'; // Create folder under web/uploads/logo
                                $model->ven_business_logo = $imagepath.$imagename.'.'.$model->file->extension;
                                $save_file = 1;
                            }
                        }
                        if ($model->save(false)) {
                            if($save_file){
                                $model->file->saveAs($path.$model->ven_business_logo);
                            }
                            return $this->redirect(['view', 'id' => $model->ven_id]);
                        }
                       // return $this->redirect(['view', 'id' => $model->ven_id]);
                    }

                } catch (Exception $e) {
                    $transaction->rollBack();
                }
                
            }else {
                return $this->render('create', [
                    'model' => $model,
                    'modelsVendorsMoreCategories' => (empty($modelsVendorsMoreCategories)) ? [new VendorsMoreCategories] : $modelsVendorsMoreCategories
                    ]);
            }
        }else {
           
         Yii::$app->user->logout();
         $this->redirect(Yii::$app->getUser()->loginUrl);
         
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

        $modelsVendorsMoreCategories = VendorsMoreCategories::find()->where(['ven_id' => $model->ven_id,'deleted' => 'N'])->all();
        // Set the path that the file will be uploaded to
        $path = Yii::getAlias('@common').'/web/';
        if ($model->load(Yii::$app->request->post())) {

            $yearCount = $model->ven_established_date;
            $currentYear = date("Y");
            $pastYear = $currentYear - $yearCount;
            $model->ven_established_date = $pastYear;
           
            foreach ($modelsVendorsMoreCategories as $modelVendorsMoreCategories) {
                # code...
                if($modelVendorsMoreCategories->vmc_id !== null) {
                    $modelVendorsMoreCategories->deleted = 'Y';
                    $modelVendorsMoreCategories->save();
                }
            }
            $modelsVendorsMoreCategories = Model::createMultiple(VendorsMoreCategories::classname());   
            Model::loadMultiple($modelsVendorsMoreCategories, Yii::$app->request->post());

            $transaction = \Yii::$app->db->beginTransaction();
            try {
             
                if ($flag = $model->save(false)) {

                    foreach ($modelsVendorsMoreCategories as $modelVendorsMoreCategories) {  
                        $modelVendorsMoreCategories->ven_id = $model->ven_id;
                        if (!($flag = $modelVendorsMoreCategories->save(false))) {
                            $transaction->rollBack();
                            break;
                        }
                    }
                }

                if ($flag) {
                    $transaction->commit();
                    $model->file = UploadedFile::getInstance($model, 'file');
                    $save_file = '';
                    if($model->file){
                        $imagename = Vendors::find()->orderBy('ven_id DESC')->one();
                        $imagename=$imagename->ven_id;
                        $imagepath = 'images/imgvendors/'; // Create folder under web/uploads/logo
                        $model->ven_business_logo = $imagepath.$imagename.'.'.$model->file->extension;
                        $save_file = 1;
                    }
                    if ($model->save(false)) {
                        if($save_file){
                            $model->file->saveAs($path.$model->ven_business_logo);
                        }
                   // return $this->redirect(['view', 'id' => $model->ven_id]);
                    }
                //return $this->redirect(['view', 'id' => $model->ven_id]);
                }
            } catch (Exception $e) {
                $transaction->rollBack();
            }
            return $this->redirect(['view', 'id' => $model->ven_id]);
            
        }else {
            return $this->render('create', [
                'model' => $model,
                'modelsVendorsMoreCategories' => (empty($modelsVendorsMoreCategories)) ? [new VendorsMoreCategories] : $modelsVendorsMoreCategories
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
