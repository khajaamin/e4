<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\User;

// AppAsset::register($this);
$asset = frontend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="'.\Yii::$app->urlManagerCommon->baseUrl.'/images/logo/logo.gif" width="150px" height="30px"/>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            'activeCssClass'=>'activeclass',
            'style' => 'font-weight: bold;',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Home', 'url' => ['/site/index']];
        $menuItems[] = ['label' => 'Blog', 'url' => ['/site/blog']];
        $menuItems[] = ['label' => 'About', 'url' => ['/site/aboutus']];
        $menuItems[] = ['label' => 'Contact', 'url' => ['/site/contact']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login'], 'linkOptions' => ['data-method' => 'post']];

    } else {
      $menuItems[] = [
            'label' => 'Home',
           // 'brandUrl' => Yii::$app->homeUrl,
            'url' => ['site/index'],
            'visible' => User::isVendor() || User::isVisitor() || User::isG() || User::isF() || User::isAdmin(),
            'linkOptions' => ['data-method' => 'post']
        ];

        $menuItems[] = [
            'label' => 'Blog',
            'url' => ['site/blog'],
            'visible' => User::isVendor() || User::isVisitor() || User::isG() || User::isF() || User::isAdmin(),
            'linkOptions' => ['data-method' => 'post']
        ];

      $menuItems[] = [
            'label' => 'Update Company',
            'url' => ['/vendors'],
            'visible' => User::isVendor(),
            'linkOptions' => ['data-method' => 'post']
        ];
       $menuItems[] = [
            'label' => 'Add Gallery',
            'url' => ['/gallery'],
            'visible' => User::isVendor(),
            'linkOptions' => ['data-method' => 'post']
        ];
        $menuItems[] = [
            'label' => 'Add Videos',
            'url' => ['/videos'],
            'visible' => User::isVendor(),
            'linkOptions' => ['data-method' => 'post']
        ];
         $menuItems[] = [
            'label' => 'Add News',
            'url' => ['/news'],
            'visible' => User::isVendor(),
            'linkOptions' => ['data-method' => 'post']
        ];
        $menuItems[] = [
            'label' => 'Add Blogs',
            'url' => ['/blog'],
            'visible' => User::isVendor(),
            'linkOptions' => ['data-method' => 'post']
        ];

        $menuItems[] = [
            'label' => 'Add Blogs',
            'url' => ['/blog/create'],
            'visible' => User::isVisitor() || User::isG() || User::isF(),
            'linkOptions' => ['data-method' => 'post']
        ];

        $menuItems[] = [
            'label' => 'About',
            'url' => ['site/aboutus'],
            'visible' => User::isVendor() || User::isVisitor() || User::isG() || User::isF() || User::isAdmin(),
            'linkOptions' => ['data-method' => 'post']
        ];
        $menuItems[] = [
            'label' => 'Contact',
            'url' => ['site/contact'],
            'visible' => User::isVisitor() || User::isG() || User::isF(),
            'linkOptions' => ['data-method' => 'post']
        ];
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
       
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= $content ?>
    </div>
</div>

   <footer class="footer" style="text-align:center; height:auto; margin-bottom: 10px;" >
    
      <div class="container" style="padding: 0px;">  
         <ul>
             <a href="?r=site/termsncond">Terms & Conditions |</a>
             <a href="?r=site/disclaimer">Disclaimer |</a>
             <a href="?r=site/liability">Liability |</a>
             <a href="?r=vendors/create">Business Registration |</a>
             <a href="?r=emails/create">Feedback |</a>
             <a href="https://www.facebook.com/Event-For-All-840061576099458/" target="_blank"><?php echo '<img src="'.\Yii::$app->urlManagerCommon->baseUrl.'/images/facebook.ico" width="20px" height="20px"/>'; ?></a>
         </ul>
         By continuing past this page, you agree to our Terms of Service, Cookie Policy, Privacy Policy and Content Policies. All trademarks are properties of their respective owners.
         <br> 2016 - © All rights reserved by Event for all</a>
     </div>

     <div class="clearfix"></div>
 </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
