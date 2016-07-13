<?php

namespace frontend\controllers;

use Yii;
use common\models\Livevents;
use common\models\LiveventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * LiveventsController implements the CRUD actions for Livevents model.
 */
class LiveventsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'update', 'delete'],
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
     * Lists all Livevents models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LiveventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Livevents model.
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
     * Creates a new Livevents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Livevents();

        // Set the path that the file will be uploaded to
        $path = Yii::getAlias('@common').'/web/';
        
        if($model->load(Yii::$app->request->post())){
            $model->file = UploadedFile::getInstance($model, 'file');
            $save_file = '';
            if($model->file){
                $imagename = Livevents::find()->orderBy('le_id DESC')->one();
                if(count($imagename) ==0) {
                    $imagename=1;
                    $imagepath = 'images/imgevents/live/'; 
                    $model->le_image = $imagepath.$imagename.'.'.$model->file->extension;
                    $save_file = 1;
                } else {
                    $imagename=$imagename->le_id+1;
                    $imagepath = 'images/imgevents/live/'; 
                    $model->le_image = $imagepath.$imagename.'.'.$model->file->extension;
                    $save_file = 1;
                }
            }
            
            if ($model->save(false)) {
                if($save_file){
                    $model->file->saveAs($path.$model->le_image);
                }
                return $this->redirect(['view', 'id' => $model->le_id]);
            }
        }else {
            return $this->render('create', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Updates an existing Livevents model.
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
                    $imagepath = 'images/imgevents/live/'; // Create folder under web/uploads/logo
                    $model->le_image = $imagepath.$model->le_id.'.'.$model->file->extension;
                    $save_file = 1;
            }

            if ($model->save(false)) {
                if($save_file){
                    $model->file->saveAs($path.$model->le_image);
                }
                return $this->redirect(['view', 'id' => $model->le_id]);
            }

        } else {
          return $this->render('update', [
            'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Livevents model.
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
     * Finds the Livevents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Livevents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Livevents::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     public function actionAddlivevent()
    {
        
        if(isset($_REQUEST))
        {
        mysql_connect("localhost","sanahk","Moments786");
        mysql_select_db("efa2");
        error_reporting(E_ALL && ~E_NOTICE);

        $eventtype = $_POST['eventtype'];
        $le_image = $_POST['evpic'];
        $name = $_POST['name'];
        $role = $_POST['role'];
        $eventname = $_POST['eventname'];
        $description = str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($_POST['description']));
       
        $venue = $_POST['venue'];
        $contact = $_POST['contact'];
        $city = $_POST['city'];
        $email = $_POST['email'];
        
        $sql="INSERT INTO livevents(le_event_category, le_contact_name, le_role, le_event_name, le_description, le_venue, le_contacts, le_city_id, le_emailid) VALUES ('$eventtype', '$name', '$role', '$eventname', '$description', '$venue', '$contact', '$city', '$email')";
       
        $result=mysql_query($sql);
            if($result){

            echo "You have been successfully Registered for the Event. Event is be Displayed after Site's approval.";            
            }
        }
    }
}
