<?php

namespace frontend\controllers;

use Yii;
use common\models\Videos;
use common\models\Vendors;
use common\models\User;
use common\models\VideosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;

/**
 * VideosController implements the CRUD actions for Videos model.
 */
class VideosController extends Controller
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
     * Lists all Videos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VideosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;


        $user = \Yii::$app->user->identity;
        $userid = \Yii::$app->user->identity->id;

        $modelVendors = Vendors::find()->where(['ven_contact_person_id' => $userid, 'deleted' => 'N'])->one();

        $query1 = new \yii\db\Query;
        $query1->select('*')->from('videos')->where(['vdo_ven_id' => $modelVendors->ven_id, 'deleted' => 'N']);
        $query1->createCommand();

        $dataProvider1 = new ActiveDataProvider([
            'query' => $query1,
            'pagination' => false,
            ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
            'dataProvider1' => $dataProvider1,
            ]);
    }

    /**
     * Displays a single Videos model.
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
     * Creates a new Videos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Videos();
        $userId = \Yii::$app->user->identity->id;
        //$vendorsModel = Vendors::find()->where(['ven_contact_person_id' =>  $userId, 'deleted' => 'N'])->one();
        //$model->vdo_ven_id =  $vendorsModel->ven_id;
        $model->vdo_user_id = $userId;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->vdo_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Updates an existing Videos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->vdo_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Deletes an existing Videos model.
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
     * Finds the Videos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Videos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Videos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
