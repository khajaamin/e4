<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use common\models\Vendors;
use common\models\User;
use common\models\Livevents;
use common\models\Complaints;
use common\models\BusinessSubCategories;
//use backend\controllers\Vendors;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        'access' => [
        'class' => AccessControl::className(),
        'rules' => [
        [
        'actions' => ['login', 'error'],
        'allow' => true,
        ],
        [
        'actions' => ['logout', 'index'],
        'allow' => true,
        'roles' => ['@'],
        ],
        ],
        ],
        'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
        'logout' => ['post'],
        ],
        ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
        'error' => [
        'class' => 'yii\web\ErrorAction',
        ],
        ];
    }

    public function actionIndex()
    {
        if(Yii::$app->user->Identity){
            if(Yii::$app->user->Identity->type != 'Admin'){
                Yii::$app->user->logout();
                return $this->redirect(Yii::$app->urlManagerFrontend->createUrl('index.php'));
            }
        }
        $query = new \yii\db\Query;
        $query->select('*')->from('vendors')->where(['deleted' => 'N'])->orderBy('ven_id')->limit(5);
        $query->createCommand();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            ]);

        $query = new \yii\db\Query;
        $query->select('*')->from('user')->where(['deleted' => 'N','type' => 'Visitor'])->orderBy('id')->limit(5);
        $query->createCommand();

        $dataProvider2 = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            ]);

        $query = new \yii\db\Query;
        $query->select('*')->from('livevents')->where(['deleted' => 'N','verified' => 'Y'])->orderBy('le_id')->limit(5);
        $query->createCommand();

       //  $query->select(['buisiness_sub_categories.bsc_name','livevents.le_id','livevents.le_contact_name','livevents.le_emailid','livevents.le_contacts'])
       // ->from(['livevents'])
       // ->join('INNER JOIN','buisiness_sub_categories','livevents.le_event_category = buisiness_sub_categories.bsc_id')
       // ->where(['livevents.deleted' => 'N','livevents.verified' => 'Y'])
       // ->orderBy('le_id')->limit(3);

        $dataProvider3 = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            ]);

        $query = new \yii\db\Query;
        $query->select(['vendors.ven_company_name','complaints.comp_id', 'complaints.comp_description','complaints.comp_tag',
            'complaints.comp_description','complaints.comp_status','complaints.com_deleted'])
        ->from(['complaints'])
        ->join('INNER JOIN','vendors','complaints.comp_vendor_id = vendors.ven_id')
        ->where(['complaints.com_deleted' => 'N'])
        ->orderBy('comp_id')->limit(3);

        $query->createCommand();

        $dataProvider4= new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            ]);


        $query = new \yii\db\Query;
        $query->select(['vendors.ven_company_name','editbusiness.edit_ven_id', 'editbusiness.edit_type', 'editbusiness.edit_bui_comment',
            'editbusiness.status','editbusiness.deleted'])
        ->from(['editbusiness'])
        ->join('INNER JOIN','vendors','editbusiness.edit_ven_id = vendors.ven_id')
        ->where(['editbusiness.deleted' => 'N'])
        ->orderBy('edit_bui_id')->limit(5);

        $query->createCommand();

        $dataProvider5= new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            ]);

        return $this->render('index',['dataProvider' => $dataProvider, 'dataProvider2' => $dataProvider2, 
            'dataProvider3' => $dataProvider3, 'dataProvider4' => $dataProvider4, 'dataProvider5' => $dataProvider5]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $query = new \yii\db\Query;
        if ($model->load(Yii::$app->request->post())) {
            $query->select('type')->from('user')->where(['username' => $model->username]);
            $query->createCommand();

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => false,
                ]);
            $dp = $dataProvider->getModels();
            if($dp[0]['type'] == 'Admin') {
                if($model->login()) {
                    return $this->goBack();
                }
            }
            else
                throw new \yii\web\HttpException(403,"You are not allowed to login here");
        } else {
            return $this->render('login', [
                'model' => $model,
                ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
