<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\SignupForm2;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\BusinessMainCategories;
use common\models\BusinessMainCategoriesSearch;
use common\models\BusinessSubCategories;
use common\models\BusinessSubCategoriesSearch;
use common\models\VendorsMoreCategories;
use common\models\CommentsAndRatings;
use common\models\NewsSearch;
use common\models\LatestpostSearch;
use common\models\BlogSearch;
use common\models\SpotlightSearch;
use common\models\GallerySearch;
use common\models\Vendors;
use common\models\VideosSearch;
use common\models\EmailsSearch;
use common\models\Cities;
use common\models\Livevents;
use common\models\User;
use common\models\Blog;
use common\models\Orders;
use yii\data\ActiveDataProvider;
session_start();

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
        'only' => ['logout', 'signup'],
        'rules' => [
        [
        'actions' => ['signup'],
        'allow' => true,
        'roles' => ['?'],
        ],
        [
        'actions' => ['logout'],
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
        'captcha' => [
        'class' => 'yii\captcha\CaptchaAction',
        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
        ],
        ];
    }

    //google login start
    public function actionGooglelogin()
    {
        if(isset($_COOKIE['gldata'])) {
            $data = explode(",", $_COOKIE['gldata']);  //id, fname, lname, email
            $username = $data[1]." ".$data[2];
            $user = User::find()->where(['email'=>$data[3]])->one();
            if(!empty($user)){
                if(Yii::$app->user->login($user)) {
                    return $this->redirect(Yii::$app->urlManagerFrontend->createUrl('index.php?r=site/index'));
                }
            }else{
                $model = new User;
                $query = new \yii\db\Query;
                $query->select('username')->from('user')->where(['username' => $username]);
                $query->createCommand();

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => false,
                    ]);
                $model = new User;
                $m = $dataProvider->getModels();

                $temp = "null";
                if(in_array($username, $m)) {
                    $temp = $username;
                }
                else {
                    $temp = $username."'";
                }
                $model->username = $temp;
                $model->email = $data[3];
                $model->password = "restricted";
                $model->type = "GL";
                $model->save();
                $user = \common\models\User::find()->where(['email'=>$data[3]])->one();
                if(Yii::$app->user->login($user)) {
                    return $this->redirect(Yii::$app->urlManagerFrontend->createUrl('index.php?r=site/index'));
                }
            }
        } else {
            return $this->redirect(Yii::$app->urlManagerFrontend->createUrl('index.php?r=site/login'));
        }
    }   //google login end

    //facebook login start
    public function actionFblogin()
    {
        if(isset($_COOKIE['fbdata'])) {
            $data = explode(",", $_COOKIE['fbdata']);  //id, fname, lname, email
            $username = $data[1]." ".$data[2];
            $user = User::find()->where(['email'=>$data[3]])->one();
            if(!empty($user)){
                if(Yii::$app->user->login($user)) {
                    return $this->redirect(Yii::$app->urlManagerFrontend->createUrl('index.php?r=site/index'));
                }
            }else{
                $model = new User;
                $query = new \yii\db\Query;
                $query->select('username')->from('user')->where(['username' => $username]);
                $query->createCommand();

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => false,
                    ]);
                $model = new User;
                $m = $dataProvider->getModels();

                $temp = "null";
                if(in_array($username, $m)) {
                    $temp = $username."'";
                }
                else {
                    $temp = $username;
                }
                $model->username = $temp;
                $model->email = $data[3];
                $model->password = "restricted";
                $model->type = "FB";
                $model->save();
                $user = \common\models\User::find()->where(['email'=>$data[3]])->one();
                if(Yii::$app->user->login($user)) {
                    return $this->redirect(Yii::$app->urlManagerFrontend->createUrl('index.php?r=site/index'));
                }
            }
        } else {
            return $this->redirect(Yii::$app->urlManagerFrontend->createUrl('index.php?r=site/login'));
        }
    }   //facebook login end

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $dataProvider = BusinessMainCategories::find()->orderBy('bmc_name')->all();

        $searchModel2 = new NewsSearch();
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
        $dataProvider2->pagination->pageSize = 5;

        $searchModel3 = new LatestpostSearch();
        $dataProvider3 = $searchModel3->search(Yii::$app->request->queryParams);
        $dataProvider3->pagination->pageSize = 5;

        $searchModel4 = new SpotlightSearch();
        $dataProvider4 = $searchModel4->search(Yii::$app->request->queryParams);
        $dataProvider4->pagination->pageSize = 3;

        $searchModel5 = new VideosSearch();
        $dataProvider5 = $searchModel5->search(Yii::$app->request->queryParams);
        $dataProvider5->pagination->pageSize = 8;

        $dataProvider7 = Vendors::find()->where(['deleted' => 'N','ven_verified' => 'Y', 'paid' => 'Y'])->all();

        $query8 = new \yii\db\Query;
        $query8->select('*')->from('business_sub_categories')->where(['deleted'=> 'N'])->andWhere(['<>','bmc_id',5])->all();
        $query8->createCommand();

        $dataProvider8 = new ActiveDataProvider([
            'query' => $query8,
            'pagination' => false,
            ]);

        $model = new Orders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        if(isset($_POST['username']) && isset($_POST['password'])) {
            $query = new \yii\db\Query;
            $query->select('*')->from('user')->where(['username' => $_POST['username']]);
            $query->createCommand();

            $dataProvider6 = new ActiveDataProvider([
                'query' => $query,
                'pagination' => false,
                ]);

            if(isset($query)) {
                return $this->render('index', [
                    'dataProvider' => $dataProvider, 'dataProvider2' => $dataProvider2, 'dataProvider3' => $dataProvider3,
                    'dataProvider4' => $dataProvider4, 'dataProvider5' => $dataProvider5, 'dataProvider6' => $dataProvider6, 'dataProvider7' => $dataProvider7, 'dataProvider8' => $dataProvider8, 'model' => $model,
                    ]);
            }
            else
                return $this->render('error');
        }
        else {
            return $this->render('index', [
                'dataProvider' => $dataProvider, 'dataProvider2' => $dataProvider2, 'dataProvider3' => $dataProvider3,
                'dataProvider4' => $dataProvider4, 'dataProvider5' => $dataProvider5, 'dataProvider7' => $dataProvider7, 'dataProvider8' => $dataProvider8, 'model' => $model,
                ]);
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = 'loginlayout';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
           $user = \Yii::$app->user->identity;
           $userType = \Yii::$app->user->identity->type;

           if($userType == 'Vendor') {
            return $this->redirect(Yii::$app->urlManagerFrontend->createUrl('index.php?r=vendors/create'));

        } else {
            return $this->redirect(Yii::$app->urlManagerFrontend->createUrl('index.php?r=site/index')); 
        }
    } else {
        return $this->render('login', [
            'model' => $model,
            ]);
    }
}

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();

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
                //return $this->redirect(['login']);//redirect to the login page
                if (Yii::$app->getUser()->login($user)) {
                return $this->redirect(Yii::$app->urlManagerFrontend->createUrl('?r=vendors/create'));
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
            'model2' => $model2,
            ]);
    }

    public function actionVendorsignup()
    {
        $model2 = new SignupForm2();
        if ($model2->load(Yii::$app->request->post())) {
            if ($user = $model2->signup()) {
                return $this->redirect(['login']);//redirect to the login page
                if (Yii::$app->getUser()->login($user)) {
                return $this->redirect(Yii::$app->urlManagerFrontend->createUrl('?r=vendors/create'));
                }
            }
        }
        return $this->render('vendorsignup', [
            'model2' => $model2,
            ]);
    }
    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
            ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
            ]);
    }

    public function actionSubcat()
    {
        $dataProvider = BusinessMainCategories::find()->orderBy('bmc_name')->all();

        $query2 = new \yii\db\Query;
        $query2->select('*')->from('business_sub_categories')->where(['bmc_id' => $_GET['img_id']])->orderBy('bsc_name');
        $query2->createCommand();

        $dataProvider2 = new ActiveDataProvider([
            'query' => $query2,
            'pagination' => false,
            ]);


        $query3 = new \yii\db\Query;
        $query3->select('*')->from('business_main_categories')->where(['bmc_id' => $_GET['img_id'], 'deleted'=> 'N'])->orderBy('bmc_name');
        $query3->createCommand();

        $dataProvider3 = new ActiveDataProvider([
            'query' => $query3,
            'pagination' => false,
            ]);

        $dataProvider4 = Vendors::find()->where(['ven_verified' => 'Y', 'paid' => 'Y'])->all();

        $query7 = new \yii\db\Query;
        $query7->select('*')->from('cities')->orderBy('name');
        $query7->createCommand();

        $dataProvider7 = new ActiveDataProvider([
            'query' => $query7,
            'pagination' => false,
            ]);

        $query8 = new \yii\db\Query;
        $query8->select('*')->from('livevents')->where(['deleted' => 'N','verified' => 'Y','paid' => 'Y'])->orderBy('le_contact_name');
        $query8->createCommand();

        $dataProvider8 = new ActiveDataProvider([
            'query' => $query8,
            'pagination' => false,
            ]);
        return $this->render('subcat', [
            'dataProvider7' => $dataProvider7,'dataProvider' => $dataProvider, 'dataProvider2' => $dataProvider2, 'dataProvider3' => $dataProvider3, 'dataProvider4' => $dataProvider4,'dataProvider8' => $dataProvider8]);
    }

    public function actionVendorinfo()
    {
        $dataProvider = BusinessMainCategories::find()->orderBy('bmc_name')->all();

        $query = new \yii\db\Query;

        $query->select(['vendors.ven_id','vendors.ven_business_logo',
            'vendors_more_categories.bsc_id','vendors.ven_established_date','vendors.ven_company_name',
            'vendors.ven_established_date','vendors.ven_country_code','vendors.ven_contact_no','vendors.ven_email_id',
            'vendors.ven_address','vendors.ven_address', 'vendors.ven_branches_loc'])
        ->from(['vendors'])
        ->join('INNER JOIN','vendors_more_categories','vendors_more_categories.ven_id = vendors.ven_id')
        ->where(['bsc_id' => $_GET['img_id'],'vendors.deleted' => 'N','vendors_more_categories.deleted' => 'N' ])->all();


        $query->createCommand();

        $dataProvider2 = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            ]);

        $query3 = new \yii\db\Query;
        $query3->select('*')->from('business_sub_categories')->where(['bsc_id' => $_GET['img_id'], 'deleted'=> 'N']);
        $query3->createCommand();

        $dataProvider3 = new ActiveDataProvider([
            'query' => $query3,
            'pagination' => ['pageSize'=>10],
            ]);

        $dataProvider4 = Vendors::find()->where(['ven_verified' => 'Y', 'paid' => 'Y'])->all();
        if(isset($_SESSION['bmc_id'])) {
            $a=$_SESSION['bmc_id'];
        } else {
        }

        $query5 = new \yii\db\Query;
        $query5->select('*')->from('business_sub_categories')->where(['bmc_id' => $_SESSION['bmc_id'], 'deleted'=> 'N'])->orderBy('bsc_name');
        $query5->createCommand();

        $dataProvider5 = new ActiveDataProvider([
            'query' => $query5,
            'pagination' => false,
            ]);

        $query6 = new \yii\db\Query;
        $query6->select('*')->from('business_sub_categories')->where(['bsc_id' => $_GET['img_id'], 'deleted'=> 'N'])->orderBy('bsc_name');
        $query6->createCommand();

        $dataProvider6 = new ActiveDataProvider([
            'query' => $query6,
            'pagination' => false,
            ]);

        $query7 = new \yii\db\Query;
        $query7->select('*')->from('cities')->orderBy('name');
        $query7->createCommand();

        $dataProvider7 = new ActiveDataProvider([
            'query' => $query7,
            'pagination' => false,
            ]);


        $query8 = new \yii\db\Query;
        $query8->select('*')->from('livevents')->where(['le_event_category' => $_GET['img_id'], 'deleted' => 'N','verified' => 'Y']);
        $query8->createCommand();

        $dataProvider8 = new ActiveDataProvider([
            'query' => $query8,
            'pagination' => false,
            ]);

        $query9 = new \yii\db\Query;
        $query9->select('*')->from('livevents')->where(['deleted' => 'N','verified' => 'Y','paid' => 'Y'])->orderBy('le_contact_name');
        $query9->createCommand();

        $dataProvider9 = new ActiveDataProvider([
            'query' => $query9,
            'pagination' => false,
            ]);


        return $this->render('vendorinfo', [
            'dataProvider' => $dataProvider, 'dataProvider2' => $dataProvider2, 'dataProvider3' => $dataProvider3, 'dataProvider4' => $dataProvider4,'dataProvider5' => $dataProvider5,'dataProvider6' => $dataProvider6,'dataProvider7' => $dataProvider7,'dataProvider8' => $dataProvider8, 'dataProvider9' => $dataProvider9]);
    }
    public function actionVendordetails()
    {
        $query1 = new \yii\db\Query;
        $query1->select('*')->from('vendors')->where(['ven_id' => $_GET['img_id'], 'deleted'=> 'N']);
        $query1->createCommand();

        $dataProvider = new ActiveDataProvider([
            'query' => $query1,
            'pagination' => false,
            ]);


        $query = new \yii\db\Query;
        $query->select('*')->from('user')->where(['id' => $_GET['img_id'], 'deleted'=> 'N']);
        $query->createCommand();

        $dataProvider2 = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            ]);

        $searchModel = new BusinessMainCategoriesSearch();
        $dataProvider3 = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider3->pagination->pageSize = $dataProvider3->getTotalCount();

        $searchModel4 = new BusinessSubCategoriesSearch();
        $dataProvider4 = $searchModel4->search(Yii::$app->request->queryParams);
        $dataProvider4->pagination->pageSize = $dataProvider4->getTotalCount();

        $query5 = new \yii\db\Query;
        $query5->select('*')->from('news')->where(['news_ven_id' => $_GET['img_id'], 'news_verified' => 'Y', 'deleted'=> 'N']);
        $query5->createCommand();

        $dataProvider5 = new ActiveDataProvider([
            'query' => $query5,
            'pagination' => false,
            ]);

        $query6 = new \yii\db\Query;
        $query6->select('*')->from('videos')->where(['vdo_ven_id' => $_GET['img_id'], 'vdo_approved' => 'Y', 'deleted'=> 'N']);
        $query6->createCommand();

        $dataProvider6 = new ActiveDataProvider([
            'query' => $query6,
            'pagination' => false,
            ]);

        $query7 = new \yii\db\Query;
        $query7->select('*')->from('gallery')->where(['gallery_ven_id' => $_GET['img_id'], 'gallery_approved' => 'Y', 'deleted'=> 'N']);
        $query7->createCommand();

        $dataProvider7 = new ActiveDataProvider([
            'query' => $query7,
            'pagination' => false,
            ]);

        $query8 = new \yii\db\Query;
        $query8->select('*')->from('business_sub_categories')->where(['deleted'=> 'N'])->andWhere(['<>','bmc_id',5])->all();
        $query8->createCommand();

        $dataProvider8 = new ActiveDataProvider([
            'query' => $query8,
            'pagination' => false,
            ]);

        $dataProvider9 = Vendors::find()->where(['ven_verified' => 'Y', 'paid' => 'Y'])->all();

        $query10 = new \yii\db\Query;

        $query10->select(['bmc_id','bsc_id','vendors_more_categories.ven_id'])
        ->from(['vendors_more_categories'])
        ->join('INNER JOIN','vendors','vendors_more_categories.ven_id = vendors.ven_id')
        ->where(['vendors_more_categories.ven_id' => $_GET['img_id'],
            'vendors.deleted' => 'N','vendors_more_categories.deleted' => 'N' ])->all();

        $query10->createCommand();

        $dataProvider10 = new ActiveDataProvider([
            'query' => $query10,
            'pagination' => false,
            ]);

        $query11 = new \yii\db\Query;
        $query11->select('*')->from('business_sub_categories')->where(['bsc_id' => $_GET['img_id'], 'deleted'=> 'N'])->orderBy('bsc_name');
        $query11->createCommand();

        $dataProvider11 = new ActiveDataProvider([
            'query' => $query11,
            'pagination' => false,
            ]);

        $query12 = new \yii\db\Query;
        $query12->select('*')->from('locations')->orderBy('name');
        $query12->createCommand();

        $dataProvider12 = new ActiveDataProvider([
            'query' => $query12,
            'pagination' => false,
            ]);

        $query13 = new \yii\db\Query;
        $query13->select(['count(cr_type_id) AS cr_type_id', 'sum(cr_ratings) AS cr_ratings'])->from('comments_and_ratings')->where(['cr_type_id' => $_GET['img_id'],'cr_type' => 'V', 'deleted' => 'N', 'cr_verified' => 'Y'])
        ->andWhere(['<>', 'cr_ratings', 0]);
         //->andWhere(['<>', 'cr_user_id', $_GET['img_id']]);
        $query13->createCommand();

        $dataProvider13 = new ActiveDataProvider([
            'query' => $query13,
            'pagination' => false,
            ]);


        $query14 = new \yii\db\Query;
        $query14->select(['user.username as username','cr_comment','cr_ratings','cr_user_id','cr_type','cr_type_id'])->from('comments_and_ratings')
        ->join('INNER JOIN','user','comments_and_ratings.cr_user_id = user.id')
        ->where(['cr_type_id' => $_GET['img_id'],'cr_type' => 'V','comments_and_ratings.deleted'=>'N','comments_and_ratings.cr_verified'=>'Y'])
        ->andWhere(['<>', 'cr_ratings', 0])->groupBy('cr_user_id');

        $query14->createCommand();

        $dataProvider14 = new ActiveDataProvider([
            'query' => $query14,
            'pagination' => false,
            ]);

        $model = new Orders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('vendordetails', ['model'=>$searchModel, 'model4' => $searchModel4,
            'dataProvider' => $dataProvider, 'dataProvider2' => $dataProvider2,
            'dataProvider3'=>$dataProvider3, 'dataProvider4'=>$dataProvider4, 'dataProvider5'=>$dataProvider5,
            'dataProvider6'=>$dataProvider6, 'dataProvider7'=>$dataProvider7,
            'dataProvider8'=>$dataProvider8, 'dataProvider9'=>$dataProvider9,'dataProvider10'=>$dataProvider10, 'dataProvider11'=>$dataProvider11,
            'dataProvider12'=>$dataProvider12,'dataProvider13'=>$dataProvider13, 'dataProvider14'=>$dataProvider14, 'model' => $model]);
    }


    public function actionSearchresult()
    {
        $dataProvider = BusinessMainCategories::find()->orderBy('bmc_name')->all();

        $query = new \yii\db\Query;
        $query->select(['vendors.ven_id','vendors.ven_business_logo',
            'vendors_more_categories.bsc_id','vendors.ven_established_date','vendors.ven_company_name',
            'vendors.ven_established_date','vendors.ven_country_code','vendors.ven_contact_no','vendors.ven_email_id', 'vendors.ven_address', 'vendors.ven_branches_loc'])
        ->from(['vendors'])
        ->join('INNER JOIN','vendors_more_categories','vendors_more_categories.ven_id = vendors.ven_id')
        ->where('ven_address LIKE :query')->andWhere(['bsc_id' => $_GET['img_id'], 'vendors.deleted' => 'N','vendors_more_categories.deleted' => 'N'])->addParams([':query'=>'%'.$_GET["location"].'%'])->distinct()->all();


        $query->createCommand();

        $dataProvider2 = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            ]);

        $query3 = new \yii\db\Query;
        $query3->select('*')->from('business_sub_categories')->where(['bsc_id' => $_GET['img_id'], 'deleted'=> 'N']);
        $query3->createCommand();

        $dataProvider3 = new ActiveDataProvider([
            'query' => $query3,
            'pagination' => ['pageSize'=>10],
            ]);


        $dataProvider4 = Vendors::find()->all();

        if(isset($_SESSION['bmc_id'])) {
            $a=$_SESSION['bmc_id'];
       // echo'session2'.$a;
        } else {
           // echo'not set';
        }

        $query5 = new \yii\db\Query;
        $query5->select('*')->from('business_sub_categories')->where(['bmc_id' => $_SESSION['bmc_id'], 'deleted'=> 'N'])->orderBy('bsc_name');
        $query5->createCommand();

        $dataProvider5 = new ActiveDataProvider([
            'query' => $query5,
            'pagination' => false,
            ]);

        $query7 = new \yii\db\Query;
        $query7->select('*')->from('cities')->orderBy('name');
        $query7->createCommand();

        $dataProvider7 = new ActiveDataProvider([
            'query' => $query7,
            'pagination' => false,
            ]);

        $query8 = new \yii\db\Query;
        $query8->select('*')->from('livevents')->where(['le_event_category' => $_GET['img_id']]);
        $query8->createCommand();

        $dataProvider8 = new ActiveDataProvider([
            'query' => $query8,
            'pagination' => false,
            ]);

        $query9 = new \yii\db\Query;
        $query9->select('*')->from('livevents')->where(['deleted' => 'N','verified' => 'Y'])->orderBy('le_contact_name');
        $query9->createCommand();

        $dataProvider9 = new ActiveDataProvider([
            'query' => $query9,
            'pagination' => false,
            ]);

        return $this->render('vendorinfo', [
            'dataProvider' => $dataProvider, 'dataProvider2' => $dataProvider2, 'dataProvider3' => $dataProvider3,
            'dataProvider4' => $dataProvider4,'dataProvider5' => $dataProvider5, 'dataProvider7' => $dataProvider7, 'dataProvider8' => $dataProvider8,
            'dataProvider9' => $dataProvider9]);
    }


    /* public function actionSearchresult()
    {
        $dataProvider = BusinessMainCategories::find()->orderBy('bmc_name')->all();
        // $dataProvider2 = Vendors::find()->where('ven_address LIKE :query')->addParams([':query'=>'%pune%'])->all();
        $query = new \yii\db\Query;
        $query->select(['vendors.ven_id','vendors.ven_business_logo',
            'vendors_more_categories.bsc_id','vendors.ven_established_date','vendors.ven_company_name',
            'vendors.ven_established_date','vendors.ven_country_code','vendors.ven_contact_no','vendors.ven_email_id',
            'vendors.ven_address', 'vendors.ven_branches_loc'])
        ->from(['vendors'])
        ->join('INNER JOIN','vendors_more_categories','vendors_more_categories.ven_id = vendors.ven_id')
        ->where('ven_address LIKE :query')->andWhere(['bsc_id' => $_GET['img_id'], 'vendors.deleted' => 'N','vendors_more_categories.deleted' => 'N'])->addParams([':query'=>'%'.$_GET["location"].'%'])->distinct()->all();

        $query->createCommand();

        $dataProvider2 = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            ]);
        $dataProvider3 = BusinessSubCategories::find()->where(['bsc_id' => $_GET['img_id'], 'deleted'=> 'N'])->all();
        $dataProvider4 = Vendors::find()->all();
        $dataProvider5 = BusinessSubCategories::find()->where(['bmc_id' => $_SESSION['bmc_id'], 'deleted'=> 'N'])->orderBy('bsc_name')->all();
        $dataProvider7 = Cities::find()->orderBy('name')->all();
        $dataProvider8 = Livevents::find()->where(['le_event_category' => $_GET['img_id']])->all();
        $dataProvider9 = Livevents::find()->where(['deleted' => 'N','verified' => 'Y'])->orderBy('le_contact_name')->all();
        return $this->render('searchresult',
            ['dataProvider' => $dataProvider, 'dataProvider2' => $dataProvider2, 'dataProvider3' => $dataProvider3, 'dataProvider4' => $dataProvider4,'dataProvider5' => $dataProvider5, 'dataProvider7' => $dataProvider7, 'dataProvider8' => $dataProvider8, 'dataProvider9' => $dataProvider9]);
        } */

        public function actionLists()
        {
            if(!empty($_GET['bmc_id'])) {
                $query8 = new \yii\db\Query;
                $query8->select('*')->from('business_sub_categories')->where(['bmc_id' => $_GET['bmc_id'], 'deleted'=> 'N']);
                $query8->createCommand();

                $dataProvider8 = new ActiveDataProvider([
                    'query' => $query8,
                    'pagination' => false,
                    ]);

                $m = $dataProvider8->getModels();
                foreach ($m as $dp) {
                    echo '<option value="'.$dp['bsc_name'].'">'.$dp['bsc_name'].'</option>';
                }
            }
        }
        public function actionAboutus()
        {
            return $this->render('aboutus');
        }

        public function actionBlog()
        {
            $dataProvider = BusinessMainCategories::find()->orderBy('bmc_name')->all();
            $bmcIds = $dataProvider;
            foreach ($bmcIds as $bmcId) {
                $bmcidArray[] = $bmcId['bmc_id'];
            }
            foreach ($bmcidArray as $bmcid) {
                $blogCnt[] = Blog::find()->where(['bmc_id' => $bmcid, 'deleted' => 'N', 'blog_featured' => 'N'])->orderBy('bmc_id')->distinct()->count();
            }

            if(!isset($_GET['img_id'])) {
                $query2 = new \yii\db\Query;
                $query2->select(['blog.blog_id','blog.blog_heading',
                    'blog.blog_image', 'blog.blog_created', 'user.username'])
                ->from(['blog'])
                ->join('INNER JOIN','user','blog.blog_user_id = user.id')
                ->where(['blog.deleted'=> 'N', 'blog.blog_featured' => 'N'])->distinct()->all();

                $dataProvider2 = new ActiveDataProvider([
                    'query' => $query2,
                    'pagination' => false,
                ]);
            } else {
                $query2 = new \yii\db\Query;
                $query2->select(['blog.blog_id','blog.blog_heading',
                    'blog.blog_image', 'blog.blog_created', 'user.username'])
                ->from(['blog'])
                ->join('INNER JOIN','user','blog.blog_user_id = user.id')
                ->where(['bmc_id' => $_GET['img_id'], 'blog.deleted'=> 'N', 'blog.blog_featured' => 'N'])->distinct()->all();

                $dataProvider2 = new ActiveDataProvider([
                    'query' => $query2,
                    'pagination' => false,
                ]);
            }

            $dataProvider3 = Blog::find()->where(['deleted' => 'N', 'blog_featured' => 'Y'])->all();

            return $this->render('blog',['dataProvider'=>$dataProvider, 'dataProvider2'=>$dataProvider2, 'dataProvider3'=>$dataProvider3, 'blogCnt' => $blogCnt]);
        }

        public function actionBlogmore()
        {
            $query = new \yii\db\Query;
            $query->select('*')->from('blog')->where(['blog_id' => $_GET['img_id'], 'deleted'=> 'N']);
            $query->createCommand();

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => false,
                ]);

            $dataProvider2 = Blog::find()->where(['blog_verified' => 'Y' ,'deleted'=> 'N'])->all();
            $query3 = new \yii\db\Query;
            $query3->select(['comments_and_ratings.cr_id','comments_and_ratings.cr_type',
                'comments_and_ratings.cr_comment','user.username'])
            ->from(['comments_and_ratings'])
            ->join('INNER JOIN','user','comments_and_ratings.cr_user_id = user.id')
            ->where(['cr_type' => 'B', 'cr_type_id' => $_GET['img_id'], 'comments_and_ratings.deleted'=> 'N'])->distinct()->all();

            $dataProvider3 = new ActiveDataProvider([
                'query' => $query3,
                'pagination' => false,
            ]);
            return $this->render('blogmore',['dataProvider' => $dataProvider, 'dataProvider2' => $dataProvider2, 'dataProvider3' => $dataProvider3]);
        }

        public function actionTermsncond()
        {
            return $this->render('termsncond');
        }

        public function actionDisclaimer()
        {
            return $this->render('disclaimer');
        }

        public function actionLiability()
        {
            return $this->render('liability');
        }

        public function actionFeedback()
        {
            return $this->render('feedback');
        }

        public function actionLatestpost()
        {
            $query = new \yii\db\Query;
            $query->select('*')->from('latestpost')->where(['latest_post_id' => $_GET['img_id']]);
            $query->createCommand();

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => false,
                ]);

            $searchModel2 = new LatestpostSearch();
            $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
            $dataProvider2->pagination->pageSize = $dataProvider2->getTotalCount();
            return $this->render('latestpost',['dataProvider' => $dataProvider, 'dataProvider2' => $dataProvider2]);
        }

        public function actionNews()
        {
            $query = new \yii\db\Query;
            $query->select('*')->from('news')->where(['news_id' => $_GET['img_id']]);
            $query->createCommand();

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => false,
                ]);

            $searchModel2 = new NewsSearch();
            $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
            $dataProvider2->pagination->pageSize = $dataProvider2->getTotalCount();
            return $this->render('news',['dataProvider' => $dataProvider, 'dataProvider2' => $dataProvider2]);
        }

        public function actionSpotlight()
        {
            $query = new \yii\db\Query;
            $query->select('*')->from('spotlight')->where(['spotlt_id' => $_GET['img_id']]);
            $query->createCommand();

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => false,
                ]);

            $searchModel2 = new SpotlightSearch();
            $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
            $dataProvider2->pagination->pageSize = $dataProvider2->getTotalCount();
            return $this->render('spotlight',['dataProvider' => $dataProvider, 'dataProvider2' => $dataProvider2]);
        }

        public function actionVideo()
        {
            $query = new \yii\db\Query;
            $query->select('*')->from('videos')->where(['vdo_id' => $_GET['img_id']]);
            $query->createCommand();

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => false,
                ]);

            $searchModel2 = new VideosSearch();
            $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
            $dataProvider2->pagination->pageSize = $dataProvider2->getTotalCount();
            return $this->render('video',['dataProvider' => $dataProvider, 'dataProvider2' => $dataProvider2]);
        }

        public function actionLivevent()
        {
            $dataProvider = Livevents::find()->where(['le_id' => $_GET['img_id'], 'deleted'=> 'N'])->all();
            $dataProvider2 = Livevents::find()->where(['deleted'=> 'N','verified' => 'Y','paid' => 'Y'])->orderBy('le_contact_name')->all();
            return $this->render('livevent',['dataProvider' => $dataProvider, 'dataProvider2' => $dataProvider2]);
        }
    }
