<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="'.\Yii::$app->urlManagerCommon->baseUrl.'/images/logo/logo.gif" width="140px" height="25px"/>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [/*
        ['label' => 'Home', 'url' => ['/site/index']],*/];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Home', 'url' => ['/site/index']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        $menuItems[] = ['label' => 'Mail',
                        'items' => [
                            ['label' => 'cPanel', 'url' => 'http://login.secureserver.net'],
                            ['label' => 'Info', 'url' => 'https://sg2plcpnl0011.prod.sin2.secureserver.net:2096'],
                        ],
                       ];
    } else {
        $menuItems[] = [
            'label' => 'Dashboard',
            'url' => ['/site/index'],
            'linkOptions' => ['data-method' => 'post']
        ];
        $menuItems[]=['label' => 'Users',
        'items' => [
        ['label' => 'User', 'url' => ['/user']],
        ['label' => 'Vendors', 'url' => ['/vendors']],
        ],
        ];
        $menuItems[]=['label' => 'Events',
        'items' => [
            ['label' => 'Main Events', 
             'url' => ['/business-main-categories']
            ],
            ['label' => 'Sub Events', 
             'url' => ['/business-sub-categories']
            ],
            ['label' => 'Livevents', 
             'url' => ['/livevents']
            ],
        ],
        ];

        $menuItems[] = [
            'label' => 'News',
            'url' => ['/news'],
            'linkOptions' => ['data-method' => 'post']
        ];

        $menuItems[]=['label' => 'Gallery',
        'items' => [
            ['label' => 'Vendors Gallery', 
             'url' => ['/vendorsgallery']
            ],
            ['label' => 'Livevents Gallery ', 
             'url' => ['/liveventsgallery']
            ],
        ],
        ];
        $menuItems[] = [
            'label' => 'Blogs',
            'url' => ['/blog'],
            'linkOptions' => ['data-method' => 'post']
        ];
        $menuItems[] = [
            'label' => 'Spotlight',
            'url' => ['/spotlight'],
            'linkOptions' => ['data-method' => 'post']
        ];
        $menuItems[] = [
            'label' => 'Latest Post',
            'url' => ['/latestpost'],
            'linkOptions' => ['data-method' => 'post']
        ];
        $menuItems[] = [
            'label' => 'Videos',
            'url' => ['/videos'],
            'linkOptions' => ['data-method' => 'post']
        ];

         $menuItems[]=['label' => 'Review',
        'items' => [
            ['label' => 'Comments & Rating', 
             'url' => ['/comments-and-ratings']
            ],
            ['label' => 'Complaints', 
             'url' => ['/editbusiness']
            ],
            ['label' => 'Site Feedback', 
             'url' => ['/emails']
            ],
            ['label' => 'Orders', 
             'url' => ['/orders']
            ],
        ],
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

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Event for all <?= date('Y') ?></p>

        <p class="pull-right">Designed & developed by <a href="http://www.sanmol.in/" rel="external">Sanmol Software Solutios</a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
