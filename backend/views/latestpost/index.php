<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LatestpostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Latestposts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="latestpost-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Latestpost'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'latest_post_id',
            'latest_post_heading',
            'latest_post_description',
            'latest_post_image',
            'latest_post_video',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
