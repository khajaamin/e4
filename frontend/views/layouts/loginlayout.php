<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <script>
    
    </script>

    
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
   
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!--Replace This Code-->
   <footer class="footer" style="text-align:center; height:auto; margin-bottom: 10px;" >
    
      <div class="container" style="padding: 0px;">  
         <ul>
             <a href="?r=site/termsncond">Terms & Conditions |</a>
             <a href="?r=site/disclaimer">Disclaimer |</a>
             <a href="?r=site/liability">Liability |</a>
             <a href="?r=vendors/create">Business Registration |</a>
             <a href="?r=site/feedback">Feedback</a>                    
         </ul>
         By continuing past this page, you agree to our Terms of Service, Cookie Policy, Privacy Policy and Content Policies. All trademarks are properties of their respective owners.
         <br> 2016 - © All rights reserved by Event for all

</a>
     </div>

     <div class="clearfix"></div>
 </footer>
 <!--Replace This Code-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
