<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BusinessSubCategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Business Sub Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-sub-categories-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Business Sub Categories'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bsc_id',
            'bsc_name',
            'bsc_image',
            'bsc_description',
            'bmc_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
