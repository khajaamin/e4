<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VideosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
ini_set('memory_limit', '-1');
$this->title = Yii::t('app', 'Videos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Videos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vdo_id',
            'vdo_url:url',
            'vdo_user_id',
            'vdo_ven_id',
            'vdo_approved',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
